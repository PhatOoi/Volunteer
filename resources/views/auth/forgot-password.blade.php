@extends('layouts.auth')

@section('title', 'Quên mật khẩu')

@section('content')
    <h1>Quên mật khẩu?</h1>
    <p class="text-muted mb-4">Nhập email của bạn, chúng tôi sẽ gửi hướng dẫn đặt lại mật khẩu.</p>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <x-form-input name="email" label="Email" type="email" icon="bi-envelope"
                      placeholder="ban@example.com" autocomplete="email" required />

        <button type="submit" class="btn btn-primary w-100">Gửi hướng dẫn</button>
    </form>

    <p class="text-center mt-4 mb-0">
        <a href="{{ route('login') }}" class="fw-semibold"><i class="bi bi-arrow-left me-1"></i>Quay lại đăng nhập</a>
    </p>
@endsection