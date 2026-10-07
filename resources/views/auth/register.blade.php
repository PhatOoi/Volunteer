@extends('layouts.auth')

@section('title', 'Đăng ký')

@section('content')
    <h1>Tạo tài khoản</h1>
    <p class="text-muted mb-4">Trở thành tình nguyện viên chỉ mất vài phút.</p>

    <form method="POST" action="{{ route('register.submit') }}">
        @csrf

        <x-form-input name="name" label="Họ và tên" icon="bi-person"
                      placeholder="Nguyễn Văn An" autocomplete="name" required />

        <x-form-input name="email" label="Email" type="email" icon="bi-envelope"
                      placeholder="ban@example.com" autocomplete="email" required />

        <x-form-input name="phone" label="Số điện thoại" type="tel" icon="bi-telephone"
                      placeholder="0900 000 000" autocomplete="tel" />

        <div class="row">
            <div class="col-md-6">
                <x-form-input name="password" label="Mật khẩu" type="password" icon="bi-lock"
                              placeholder="Tối thiểu 8 ký tự" autocomplete="new-password" required />
            </div>
            <div class="col-md-6">
                <x-form-input name="password_confirmation" label="Nhập lại mật khẩu" type="password" icon="bi-lock-fill"
                              placeholder="Nhập lại mật khẩu" autocomplete="new-password" required />
            </div>
        </div>

        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" name="agree" id="agree" required>
            <label class="form-check-label" for="agree">Tôi đồng ý với <a href="#">điều khoản sử dụng</a></label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Đăng ký</button>
    </form>

    <p class="text-center mt-4 mb-0">Đã có tài khoản? <a href="{{ route('login') }}" class="fw-semibold">Đăng nhập</a></p>
@endsection