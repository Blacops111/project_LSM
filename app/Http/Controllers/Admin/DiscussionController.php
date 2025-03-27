<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discussion;


class DiscussionController extends Controller
{
    public function index()
    {
        $discussions = Discussion::with('user')->latest()->get();
        return view('admin-dashboard.discussions.index', compact('discussions'));
    }

    public function store(Request $request)
    {
        // Handle creating a new discussion
    }

    public function destroy($id)
    {
        // Handle deleting discussion logic
    }
}
