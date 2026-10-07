<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Quản trị') - Tình Nguyện Xanh</title>

    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>

@php
    // Danh sách menu sidebar. Muốn thêm menu mới chỉ cần thêm 1 dòng vào đây.
    // [tên route, icon, nhãn hiển thị, mẫu route để tô sáng menu active]
    $menu = [
        ['admin.dashboard',     'bi-speedometer2',  'Dashboard',          'admin.dashboard'],
        ['admin.volunteers',    'bi-people',        'Tình nguyện viên',   'admin.volunteers*'],
        ['admin.activities',    'bi-calendar-event','Hoạt động',          'admin.activities*'],
        ['admin.registrations', 'bi-journal-check', 'Đăng ký',            'admin.registrations*'],
        ['admin.settings',      'bi-gear',          'Cài đặt',            'admin.settings*'],
    ];
@endphp

{{-- ============ SIDEBAR ============ --}}
<aside class="admin-sidebar offcanvas-lg offcanvas-start" tabindex="-1" id="adminSidebar" aria-label="Menu quản trị">
    <div class="sidebar-inner">
        <div class="d-flex align-items-start justify-content-between">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
                <span class="logo"><i class="bi bi-heart-fill"></i></span>
                <span>Tình Nguyện Xanh<small>Trang quản trị</small></span>
            </a>
            {{-- Nút đóng: chỉ hiện trên mobile --}}
            <button type="button" class="btn-close btn-close-white d-lg-none m-3"
                    data-bs-dismiss="offcanvas" data-bs-target="#adminSidebar" aria-label="Đóng menu"></button>
        </div>

        <nav class="sidebar-nav">
            @foreach ($menu as [$route, $icon, $label, $pattern])
                <a href="{{ route($route) }}" @class(['sidebar-link', 'active' => request()->routeIs($pattern)])>
                    <i class="bi {{ $icon }}"></i> {{ $label }}
                </a>
            @endforeach
        </nav>

        <div class="sidebar-footer">
            {{-- Tạm thời đưa về trang chủ. Giai đoạn 5 sẽ làm đăng xuất thật bằng form POST --}}
            <a href="{{ url('/') }}" class="sidebar-link">
                <i class="bi bi-box-arrow-left"></i> Đăng xuất
            </a>
        </div>
    </div>
</aside>

{{-- ============ PHẦN BÊN PHẢI: HEADER + NỘI DUNG ============ --}}
<div class="admin-main">

    <header class="admin-header">
        {{-- Nút mở sidebar (chỉ hiện trên mobile/tablet) --}}
        <button class="icon-btn d-lg-none" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#adminSidebar" aria-controls="adminSidebar" aria-label="Mở menu">
            <i class="bi bi-list"></i>
        </button>

        <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>

        {{-- Thông báo --}}
        <div class="dropdown">
            <button class="icon-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Thông báo">
                <i class="bi bi-bell"></i><span class="dot"></span>
            </button>
            <div class="dropdown-menu dropdown-menu-end notify-menu p-0">
                <div class="px-3 py-2 border-bottom fw-semibold">Thông báo</div>
                <a class="dropdown-item small text-wrap" href="{{ route('admin.registrations') }}">
                    <i class="bi bi-person-plus text-success me-1"></i> 3 đăng ký mới đang chờ duyệt
                </a>
                <a class="dropdown-item small text-wrap" href="{{ route('admin.activities') }}">
                    <i class="bi bi-calendar-event text-warning me-1"></i> Hoạt động "Dọn bãi biển" diễn ra ngày mai
                </a>
                <a class="dropdown-item text-center small text-primary border-top" href="{{ route('admin.notifications') }}">Xem tất cả</a>
            </div>
        </div>

        {{-- Menu tài khoản --}}
        <div class="dropdown">
            <button class="user-menu-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="avatar">QT</span>
                <span class="d-none d-md-block text-start lh-sm">
                    <span class="d-block fw-semibold">Quản trị viên</span>
                    <small class="text-muted">admin@example.com</small>
                </span>
                <i class="bi bi-chevron-down small d-none d-md-block"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('admin.settings') }}"><i class="bi bi-gear me-2"></i>Cài đặt</a></li>
                <li><a class="dropdown-item" href="{{ route('volunteer.dashboard') }}"><i class="bi bi-person-heart me-2"></i>Giao diện tình nguyện viên</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="{{ url('/') }}"><i class="bi bi-box-arrow-left me-2"></i>Đăng xuất</a></li>
            </ul>
        </div>
    </header>

    <main class="admin-content">
        @include('partials.flash')
        @yield('content')
    </main>

    <footer class="admin-footer">&copy; {{ date('Y') }} Tình Nguyện Xanh - Trang quản trị</footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>