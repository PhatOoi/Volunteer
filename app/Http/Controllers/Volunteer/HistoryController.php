<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Support\DemoData;

class HistoryController extends Controller
{
    public function index()
    {
        // TODO: lấy từ bảng điểm danh / đăng ký của người dùng đang đăng nhập
        $history = DemoData::history();
        $stats = DemoData::stats();

        return view('volunteer.history', compact('history', 'stats'));
    }
}