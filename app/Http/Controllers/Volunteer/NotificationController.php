<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Support\DemoData;

class NotificationController extends Controller
{
    public function index()
    {
        // TODO: Notification::where('user_id', auth()->id())->latest()->get();
        $notifications = DemoData::notifications();

        return view('volunteer.notifications', compact('notifications'));
    }
}