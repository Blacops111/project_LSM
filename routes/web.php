<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Admin Controllers
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\AssignmentController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\DiscussionController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\NotificationController;

// Student Controllers
use App\Http\Controllers\Student\StudentCourseController;
use App\Http\Controllers\Student\StudentAssignmentController;
use App\Http\Controllers\Student\StudentGradeController;
use App\Http\Controllers\Student\StudentDiscussionController;
use App\Http\Controllers\Student\StudentScheduleController;
use App\Http\Controllers\Student\StudentNotificationController;

// ✅ Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// ✅ AUTHENTICATED USERS DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ✅ USER PROFILE ROUTES
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ ADMIN DASHBOARD ROUTES (Only Accessible by Admins)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Course Management
    Route::resource('courses', CourseController::class);

    // Assignments Management
    Route::resource('assignments', AssignmentController::class);

    // Student Management
    Route::resource('students', StudentController::class);

    // Discussion Forum
    Route::resource('discussions', DiscussionController::class);

    // Reports Management
    Route::resource('reports', ReportController::class);
    Route::get('/reports/generate', [ReportController::class, 'generate'])->name('reports.generate');

    // Class Scheduling
    Route::resource('schedule', ScheduleController::class);

    // Notifications Management
    Route::resource('notifications', NotificationController::class);
});

// ✅ STUDENT DASHBOARD ROUTES (Only Accessible by Students)
Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', function () {
        return view('student-dashboard.dashboard');
    })->name('dashboard');

    // Course Routes
    Route::resource('courses', StudentCourseController::class)->only(['index', 'show']);

    // Assignment Routes
    Route::resource('assignments', StudentAssignmentController::class)->only(['index', 'show', 'store']);

    // Grades Routes
    Route::resource('grades', StudentGradeController::class)->only(['index']);

    // Discussions Routes
    Route::resource('discussions', StudentDiscussionController::class)->only(['index', 'show', 'store']);

    // Schedule Routes
    Route::resource('schedule', StudentScheduleController::class)->only(['index']);

    // Notifications Routes
    Route::resource('notifications', StudentNotificationController::class)->only(['index']);
});

// ✅ Authentication Routes
require __DIR__.'/auth.php';
