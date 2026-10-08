<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // ----- Đăng nhập -----
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email chưa đúng định dạng.',
            'password.required' => 'Mật khẩu không được để trống.',
        ]);

        // TODO (khi có bảng users đầy đủ): dùng Auth::attempt() để kiểm tra tài khoản thật.
        // Hiện tại là bản demo nên cho đăng nhập luôn.
        return redirect()->route('volunteer.dashboard');
    }

    // ----- Đăng ký tài khoản -----
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|min:8|confirmed',
            'agree' => 'accepted',
        ], [
            'name.required' => 'Họ và tên không được để trống.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email chưa đúng định dạng.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.confirmed' => 'Mật khẩu nhập lại chưa khớp.',
            'agree.accepted' => 'Bạn cần đồng ý với điều khoản để đăng ký.',
        ]);

        // TODO (khi có database): User::create([...]) - cột phone cần bảng users bổ sung.
        return redirect()->route('login')
            ->with('success', 'Đăng ký thành công (bản demo)! Hãy đăng nhập.');
    }

    // ----- Quên mật khẩu -----
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email'], [
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email chưa đúng định dạng.',
        ]);

        return back()->with('success', 'Nếu email tồn tại, chúng tôi đã gửi hướng dẫn đặt lại mật khẩu (bản demo).');
    }
}