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
<body>

<div class="auth-wrap">

    {{-- Cột trái: chỉ hiện trên màn hình lớn --}}
    <aside class="auth-side">
        <a href="{{ route('home') }}" class="auth-brand">
            <span class="logo"><i class="bi bi-heart-fill"></i></span> Tình Nguyện Xanh
        </a>

        <div>
            <h2>Cùng nhau làm nên<br>những điều tử tế</h2>
            <ul>
                <li><i class="bi bi-check-circle-fill"></i> Tìm hoạt động tình nguyện phù hợp với bạn</li>
                <li><i class="bi bi-check-circle-fill"></i> Đăng ký tham gia chỉ với vài thao tác</li>
                <li><i class="bi bi-check-circle-fill"></i> Theo dõi số giờ tình nguyện và thành tích</li>
            </ul>
        </div>

        <small class="opacity-75">&copy; {{ date('Y') }} Tình Nguyện Xanh</small>
    </aside>

    {{-- Cột phải: form --}}
    <div class="auth-main">
        <div class="auth-box">
            {{-- Logo cho mobile (cột trái đã bị ẩn) --}}
            <a href="{{ route('home') }}" class="auth-brand auth-brand-mobile d-lg-none">
                <span class="logo"><i class="bi bi-heart-fill"></i></span> Tình Nguyện Xanh
            </a>

            @include('partials.flash')
            @yield('content')
        </div>
    </div>
</div>

<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    // Nút hiện/ẩn mật khẩu: <button data-toggle-password="#idCuaO">
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