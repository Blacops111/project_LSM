@extends('layouts.student-layout')

@section('content')
    <div class="bg-white shadow-md p-6 rounded-lg">
        <h1 class="text-2xl font-bold mb-4">Welcome, {{ Auth::user()->name }}!</h1>
        <p>This is your student dashboard. You can access your courses, assignments, grades, and discussions here.</p>
    </div>
@endsection
{{-- @section('sidebar')
    <div class="bg-white shadow-md p-6 rounded-lg mt-4">
        <h2 class="text-xl font-semibold mb-4">Quick Links</h2>
        <ul class="space-y-2">
            <li><a href="{{ route('student.courses') }}" class="text-blue-600 hover:underline">My Courses</a></li>
            <li><a href="{{ route('student.assignments') }}" class="text-blue-600 hover:underline">Assignments</a></li>
            <li><a href="{{ route('student.grades') }}" class="text-blue-600 hover:underline">Grades</a></li>
            <li><a href="{{ route('student.discussions') }}" class="text-blue-600 hover:underline">Discussions</a></li>
        </ul>
    </div> --}}