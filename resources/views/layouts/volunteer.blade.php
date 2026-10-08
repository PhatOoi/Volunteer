<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Tình Nguyện Xanh')</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages.css') }}" rel="stylesheet">
    <link href="{{ asset('css/volunteer.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">

@php
    // [tên route, nhãn, mẫu route để tô sáng menu active]
    $menu = [
        ['volunteer.dashboard',     'Trang chủ',          'volunteer.dashboard'],
        ['volunteer.activities',    'Hoạt động',          'volunteer.activities*'],
        ['volunteer.my-activities', 'Hoạt động của tôi',  'volunteer.my-activities*'],
        ['volunteer.history',       'Lịch sử',            'volunteer.history*'],
        ['volunteer.notifications', 'Thông báo',          'volunteer.notifications*'],
    ];
@endphp

{{-- ============ NAVBAR ============ --}}
<nav class="navbar navbar-expand-lg vl-navbar sticky-top" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('volunteer.dashboard') }}">
            <span class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Tình Nguyện Xanh">
    </span> 
        </a>

        {{-- Nút hamburger (hiện trên mobile) --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#volunteerNav"
                aria-controls="volunteerNav" aria-expanded="false" aria-label="Mở menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="volunteerNav">
            <ul class="navbar-nav mx-auto mt-3 mt-lg-0 gap-lg-1">
                @foreach ($menu as [$route, $label, $pattern])
                    <li class="nav-item">
                        <a href="{{ route($route) }}" @class(['nav-link', 'active' => request()->routeIs($pattern)])>{{ $label }}</a>
                    </li>
                @endforeach
            </ul>

            <ul class="navbar-nav align-items-lg-center gap-lg-1">
                <li class="nav-item">
                    <a href="{{ route('volunteer.profile') }}" @class(['nav-link', 'active' => request()->routeIs('volunteer.profile*')])>
                        <span class="avatar me-2" style="width:30px;height:30px;font-size:.75rem">NA</span> Hồ sơ
                    </a>
                </li>
                <li class="nav-item">
                    {{-- Tạm thời đưa về trang chủ. Giai đoạn 5 sẽ làm đăng xuất thật --}}
                    <a href="{{ url('/') }}" class="nav-link"><i class="bi bi-box-arrow-right me-2"></i>Đăng xuất</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- ============ NỘI DUNG ============ --}}
<main class="flex-grow-1">
    <div class="container page-container">
        @include('partials.flash')
        @yield('content')
    </div>
</main>

@include('partials.footer')

<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>