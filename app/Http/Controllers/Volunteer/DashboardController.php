<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Support\DemoData;

class DashboardController extends Controller
{
    public function index()
    {
        // TODO (khi có database):
        // $user     = auth()->user();
        // $upcoming = Registration::where('user_id', $user->id)->with('activity')->get();
        // $featured = Activity::where('status', 'open')->take(3)->get();
        $user = DemoData::user();
        $stats = DemoData::stats();
        $upcoming = DemoData::myRegistrations();
        // 3 hoạt động nổi bật: id 2, 3, 5
        $featured = array_values(array_filter(
            DemoData::activities(),
            fn ($a) => in_array($a['id'], [2, 3, 5])
        ));

        return view('volunteer.dashboard', compact('user', 'stats', 'upcoming', 'featured'));
    }
}