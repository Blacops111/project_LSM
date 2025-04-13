<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class StudentCourseController extends Controller
{
    /**
     * Display a list of courses the student is enrolled in.
     */
    public function index()
    {
        $student = Auth::user();
        $courses = $student->courses; // Assuming the relationship exists
        
        return view('student-dashboard.courses.index', compact('courses'));
    }

    /**
     * Show details of a specific course.
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        
        // Check if the student is enrolled in the course
        if (!Auth::user()->courses->contains($course)) {
            abort(403, 'Unauthorized access');
        }
        
        return view('student-dashboard.courses.show', compact('course'));
    }
}
