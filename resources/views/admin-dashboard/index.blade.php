@extends('layouts.admin-layout') 

@section('content')
<div class="p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Welcome to Admin Dashboard</h1>
    <p class="mt-2 text-gray-600 dark:text-gray-300">Manage courses, assignments, students, reports, and more.</p>

    <div class="grid grid-cols-2 gap-6 mt-6">
        <a href="{{ route('courses.index') }}" class="p-4 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Manage Courses</a>
        <a href="{{ route('assignments.index') }}" class="p-4 bg-green-500 text-white rounded-lg hover:bg-green-600">Review Assignments</a>
        <a href="{{ route('students.index') }}" class="p-4 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Manage Students</a>
        <a href="{{ route('reports.index') }}" class="p-4 bg-red-500 text-white rounded-lg hover:bg-red-600">View Reports</a>
        <a href="{{ route('schedule.index') }}" class="p-4 bg-purple-500 text-white rounded-lg hover:bg-purple-600">Schedule Classes</a>
        <a href="{{ route('notifications.index') }}" class="p-4 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600">Send Notifications</a>
    </div>
</div>
@endsection

