<?php

namespace App\Http\Controllers;

use App\Support\DemoData;

class HomeController extends Controller
{
    // Trang chủ: hiện 3 hoạt động nổi bật
    public function index()
    {
        // TODO (khi có database): $featured = Activity::latest()->take(3)->get();
        $featured = array_slice(DemoData::activities(), 0, 3);

        return view('home.index', compact('featured'));
    }
}