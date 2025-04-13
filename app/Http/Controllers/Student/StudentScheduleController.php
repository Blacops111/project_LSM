<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentScheduleController extends Controller
{
    /**
     * Display a listing of the student's schedule.
     */
    public function index()
    {
        $schedules = Schedule::whereHas('course.students', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();

        return view('student-dashboard.schedule.index', compact('schedules'));
    }
}
