<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\AssignmentController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\DiscussionController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ClassScheduleController;
use App\Http\Controllers\Admin\NotificationController;
use Illuminate\Support\Facades\Route;

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
    Route::resource('schedule', ClassScheduleController::class);
    
    // Notifications Management
    Route::resource('notifications', NotificationController::class);
});


require __DIR__.'/auth.php';
