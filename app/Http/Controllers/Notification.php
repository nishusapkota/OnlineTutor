<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Notification extends Controller
{
    public function show(\App\Models\Assignment $assignment)
    {
        $user = Auth::user();
        $notifications = $user->unreadNotifications;
        $course=$assignment->course;
        return view('student.notification', compact('notifications','course','assignment'));
    }
}
