<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;

class StudentAssignmentController extends Controller
{
    // ✅ Show all assignments for the student
    public function index()
    {
        $assignments = Assignment::all();
        return view('student-dashboard.assignments.index', compact('assignments'));
    }

    // ✅ Show a specific assignment
    public function show($id)
    {
        $assignment = Assignment::findOrFail($id);
        return view('student-dashboard.assignments.show', compact('assignment'));
    }

    // ✅ Submit an assignment
    public function store(Request $request)
    {
        $request->validate([
            'assignment_id' => 'required|exists:assignments,id',
            'file' => 'required|mimes:pdf,doc,docx,zip|max:2048',
        ]);

        // Store the file
        $filePath = $request->file('file')->store('submissions', 'public');

        // Create the submission record
        Submission::create([
            'student_id' => Auth::id(),
            'assignment_id' => $request->assignment_id,
            'file_path' => $filePath,
        ]);

        return redirect()->route('student.assignments.index')->with('success', 'Assignment submitted successfully.');
    }
}
