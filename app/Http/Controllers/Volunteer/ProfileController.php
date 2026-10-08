<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Support\DemoData;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Xem hồ sơ
    public function show()
    {
        $user = DemoData::user();   // TODO: auth()->user()
        $stats = DemoData::stats();

        return view('volunteer.profile', compact('user', 'stats'));
    }

    // Lưu hồ sơ
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'nullable|string|max:20',
            'birthday' => 'nullable|date|before:today',
            'address' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'avatar' => 'nullable|image|max:2048',
        ], [
            'name.required' => 'Họ và tên không được để trống.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email chưa đúng định dạng.',
            'birthday.date' => 'Ngày sinh không hợp lệ.',
            'birthday.before' => 'Ngày sinh phải là ngày trong quá khứ.',
            'avatar.image' => 'Ảnh đại diện phải là file ảnh.',
            'avatar.max' => 'Ảnh đại diện tối đa 2MB.',
        ]);

        // TODO (khi có database): auth()->user()->update($request->only([...]));
        // Các cột phone, birthday, address, bio, avatar cần bảng users bổ sung.
        return redirect()->route('volunteer.profile')
            ->with('success', 'Đã lưu hồ sơ (bản demo, chưa lưu vào database).');
    }
}