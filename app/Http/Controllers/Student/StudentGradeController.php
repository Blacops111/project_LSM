<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Grade;

class StudentGradeController extends Controller {
    public function index() {
        $grades = Grade::where('student_id', Auth::id())->with('assignment')->get();
        return view('student-dashboard.grades.index', compact('grades'));
    }
}
