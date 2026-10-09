<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Tài khoản') - Tình Nguyện Xanh</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">

{{-- ============ THANH MENU (NAVBAR) ============ --}}
<nav class="navbar navbar-expand-lg vl-navbar sticky-top" data-bs-theme="dark">
    <div class="container">
        <!-- Logo kép (giống trang chủ) -->
        <a href="{{ url('/') }}" class="navbar-brand vl-brand d-flex align-items-center gap-2">
            <span class="logo"><img src="{{ asset('images/logo.png') }}" alt="Logo 1"></span>
            <span class="logo"><img src="{{ asset('images/logoso.png') }}" alt="Logo 2"></span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#guestNav"
                aria-controls="guestNav" aria-expanded="false" aria-label="Mở menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="guestNav">
            <ul class="navbar-nav mx-auto mt-3 mt-lg-0 gap-lg-1">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Trang chủ</a></li>
                <li class="nav-item"><a href="{{ route('home') }}#gioi-thieu" class="nav-link">Giới thiệu</a></li>
                <li class="nav-item"><a href="{{ route('volunteer.activities') }}" class="nav-link">Hoạt động</a></li>
                <li class="nav-item"><a href="{{ route('home') }}#cach-tham-gia" class="nav-link">Cách tham gia</a></li>
            </ul>

            <div class="d-grid gap-2 d-lg-flex mt-3 mt-lg-0">
                <a href="{{ route('login') }}" class="btn btn-accent">Đăng nhập</a>
            </div>
        </div>
    </div>
</nav>

{{-- ============ NỘI DUNG CHÍNH (FORM ĐĂNG NHẬP/ĐĂNG KÝ) ============ --}}
<main class="flex-grow-1 d-flex align-items-center justify-content-center py-4">
    <div class="container">
        <div class="auth-wrap shadow rounded overflow-hidden">
            
            {{-- Cột trái: Hình nền / Slogan (chỉ hiện trên màn hình lớn) --}}
            <aside class="auth-side">
                <div>
                    <h2>Cùng nhau làm nên<br>những điều tử tế</h2>
                    <ul class="list-unstyled mt-3">
                        <li class="mb-2"><i class="bi bi-check-circle-fill"></i> Tìm hoạt động tình nguyện phù hợp với bạn</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill"></i> Đăng ký tham gia chỉ với vài thao tác</li>
                        <li><i class="bi bi-check-circle-fill"></i> Theo dõi số giờ tình nguyện và thành tích</li>
                    </ul>
                </div>
                <small class="opacity-75">&copy; {{ date('Y') }} Tình Nguyện Xanh</small>
            </aside>

            {{-- Cột phải: Form chứa nội dung yield --}}
            <div class="auth-main p-4 p-lg-5 bg-white">
                <div class="auth-box">
                    @include('partials.flash')
                    @yield('content')
                </div>
            </div>

        </div>
    </div>
</main>

@include('partials.footer')

<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    // Nút hiện/ẩn mật khẩu
    document.querySelectorAll('[data-toggle-password]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var input = document.querySelector(btn.getAttribute('data-toggle-password'));
            var icon = btn.querySelector('i');
            var show = input.type === 'password';
            input.type = show ? 'text' : 'password';
            icon.className = show ? 'bi bi-eye-slash' : 'bi bi-eye';
        });
    });
</script>
@stack('scripts')
</body>
</html>