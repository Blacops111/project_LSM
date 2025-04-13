<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDiscussionController extends Controller
{
    // Display a list of discussions
    public function index()
    {
        $discussions = Discussion::latest()->paginate(10);
        return view('student-dashboard.discussions.index', compact('discussions'));
    }

    // Show a specific discussion thread
    public function show(Discussion $discussion)
    {
        return view('student-dashboard.discussions.show', compact('discussion'));
    }

    // Store a new discussion post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Discussion::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('student.discussions.index')->with('success', 'Discussion created successfully!');
    }
}
