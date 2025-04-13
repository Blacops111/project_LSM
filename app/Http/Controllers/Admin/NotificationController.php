<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    /**
     * Display a listing of notifications.
     */
    public function index()
    {
        $notifications = Notification::latest()->get();
        return view('admin-dashboard.notifications.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new notification.
     */
    public function create()
    {
        return view('admin-dashboard.notifications.create');
    }

    /**
     * Store a newly created notification in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'message' => 'required|string',
            'target'  => 'required|in:all,students,teachers',
        ]);

        Notification::create($request->all());

        return redirect()->route('notifications.index')->with('success', 'Notification sent successfully.');
    }

    /**
     * Display the specified notification.
     */
    public function show($id)
    {
        $notification = Notification::findOrFail($id);
        return view('admin-dashboard.notifications.show', compact('notification'));
    }

    /**
     * Show the form for editing the specified notification.
     */
    public function edit($id)
    {
        $notification = Notification::findOrFail($id);
        return view('admin-dashboard.notifications.edit', compact('notification'));
    }

    /**
     * Update the specified notification in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'message' => 'required|string',
            'target'  => 'required|in:all,students,teachers',
        ]);

        $notification = Notification::findOrFail($id);
        $notification->update($request->all());

        return redirect()->route('notifications.index')->with('success', 'Notification updated successfully.');
    }

    /**
     * Remove the specified notification from storage.
     */
    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return redirect()->route('notifications.index')->with('success', 'Notification deleted successfully.');
    }
}
