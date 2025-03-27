<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Assuming students are stored in 'users' table
use App\Models\Course;

class StudentController extends Controller
{
    /**
     * Display a listing of students.
     */
    public function index()
    {
        // Fetch only students with role 'student' and load their courses
        $students = User::where('role', 'student')->with('courses')->get();

        return view('admin-dashboard.students.index', compact('students'));
    }

    /**
     * Display the specified student.
     */
    public function show($id)
    {
        // Fetch student with enrolled courses
        $student = User::where('role', 'student')->with('courses')->findOrFail($id);

        return view('admin-dashboard.students.show', compact('student'));
    }

    /**
     * Remove the specified student from storage.
     */
    public function destroy($id)
    {
        // Find student and ensure they exist
        $student = User::where('role', 'student')->findOrFail($id);

        // Optionally: Remove course relationships before deleting the student
        $student->courses()->detach();

        // Delete the student
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}



