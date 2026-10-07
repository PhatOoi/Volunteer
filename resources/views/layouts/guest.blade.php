<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Tình Nguyện Xanh - Kết nối những trái tim tử tế')</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">

{{-- ============ NAVBAR DÀNH CHO KHÁCH (chưa đăng nhập) ============ --}}
<nav class="navbar navbar-expand-lg vl-navbar sticky-top" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <span class="logo"><i class="bi bi-heart-fill"></i></span> Tình Nguyện Xanh
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#guestNav"
                aria-controls="guestNav" aria-expanded="false" aria-label="Mở menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="guestNav">
            <ul class="navbar-nav me-auto mt-3 mt-lg-0 gap-lg-1">
                <li class="nav-item"><a href="{{ route('home') }}" @class(['nav-link', 'active' => request()->routeIs('home')])>Trang chủ</a></li>
                <li class="nav-item"><a href="{{ route('home') }}#gioi-thieu" class="nav-link">Giới thiệu</a></li>
                <li class="nav-item"><a href="{{ route('volunteer.activities') }}" class="nav-link">Hoạt động</a></li>
                <li class="nav-item"><a href="{{ route('home') }}#cach-tham-gia" class="nav-link">Cách tham gia</a></li>
            </ul>

            <div class="d-grid gap-2 d-lg-flex mt-3 mt-lg-0">
                <a href="{{ route('login') }}" class="btn btn-outline-light">Đăng nhập</a>
                <a href="{{ route('register') }}" class="btn btn-accent">Đăng ký</a>
            </div>
        </div>
    </div>
</nav>

<main class="flex-grow-1">
    @include('partials.flash')
    @yield('content')
</main>

@include('partials.footer')

<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>