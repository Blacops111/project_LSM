@extends('layouts.student-layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">My Courses</h2>

    @if($courses->isEmpty())
        <p class="text-gray-600">You are not enrolled in any courses yet.</p>
    @else
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Course Title</th>
                    <th class="border border-gray-300 px-4 py-2">Instructor</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $course->title }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $course->instructor->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('student.courses.show', $course->id) }}" class="text-blue-600 hover:underline">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
