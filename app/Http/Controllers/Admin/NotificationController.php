<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        return view('admin-dashboard.notifications.index'); // View notifications
    }

    public function store(Request $request)
    {
        // Handle sending notifications
    }
}
