<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class StudentNotificationController extends Controller
{
    /**
     * Display a list of notifications for the student.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $notifications = Auth::user()->notifications()->latest()->paginate(10);
        return view('student-dashboard.notifications.index', compact('notifications'));
    }

    /**
     * Display a specific notification.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        $notification = Auth::user()->notifications()->findOrFail($id);
        $notification->markAsRead();
        return redirect()->back()->with('success', 'Notification marked as read.');
    }

    /**
     * Mark a specific notification as read.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAsRead($id)
    {
        $notification = Auth::user()->notifications()->findOrFail($id);

        if (is_null($notification->read_at)) {
            $notification->update(['read_at' => now()]);
        }

        return redirect()->back()->with('success', 'Notification marked as read.');
    }

    /**
     * Mark all notifications as read.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAllAsRead()
    {
        Auth::user()->notifications()->whereNull('read_at')->update(['read_at' => now()]);
        return redirect()->back()->with('success', 'All notifications marked as read.');
    }

    /**
     * Delete a specific notification.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $notification = Auth::user()->notifications()->findOrFail($id);
        $notification->delete();

        return redirect()->back()->with('success', 'Notification deleted.');
    }

    /**
     * Clear all notifications for the student.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clearAll()
    {
        Auth::user()->notifications()->delete();
        return redirect()->back()->with('success', 'All notifications cleared.');
    }

    /**
     * Get unread notifications count.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUnreadCount()
    {
        $count = Auth::user()->notifications()->whereNull('read_at')->count();
        return response()->json(['count' => $count]);
    }
}