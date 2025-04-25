<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class NotificationController extends Controller
{
    public function __construct()
    {
        // Share unreadCount with all views
        View::share('unreadCount', 0); // For now, we'll set a static count
    }

    public function index()
    {
        // For now, we'll set a static unread count
        // Later you can implement actual notification counting logic
        $unreadCount = 0;
        
        return view('student.notification', compact('unreadCount'));
    }
} 