@extends('layouts.auth')

@section('title', 'Đăng nhập')

@section('content')
    <h1>Đăng nhập</h1>
    <p class="text-muted mb-4">Chào mừng bạn quay lại! Vui lòng nhập thông tin tài khoản.</p>

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf

        <x-form-input name="email" label="Email" type="email" icon="bi-envelope"
                      placeholder="ban@example.com" autocomplete="email" required />

        <x-form-input name="password" label="Mật khẩu" type="password" icon="bi-lock"
                      placeholder="Nhập mật khẩu" autocomplete="current-password" required />

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
            </div>
            <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
        </div>

        <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
    </form>

    <p class="text-center mt-4 mb-2">Chưa có tài khoản? <a href="{{ route('register') }}" class="fw-semibold">Đăng ký ngay</a></p>

    {{-- Chỉ dùng khi đang làm giao diện, giai đoạn 5 sẽ xóa --}}
    <div class="text-center small text-muted border-top pt-3 mt-3">
        Bản demo: bấm "Đăng nhập" để vào giao diện tình nguyện viên.<br>
        <a href="{{ route('admin.dashboard') }}">Vào thử trang quản trị</a>
    </div>
@endsection