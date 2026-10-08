<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Support\DemoData;

class MyActivityController extends Controller
{
    // Hoạt động tôi đã đăng ký
    public function index()
    {
        // TODO: Registration::where('user_id', auth()->id())->with('activity')->get();
        $registrations = DemoData::myRegistrations();

        return view('volunteer.my-activities', compact('registrations'));
    }

    // Hủy đăng ký
    public function cancel()
    {
        // TODO (khi có database): đổi status của đăng ký thành 'cancelled'
        return back()->with('success', 'Đã hủy đăng ký (bản demo).');
    }
}