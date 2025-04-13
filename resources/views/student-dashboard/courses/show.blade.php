@extends('layouts.student-layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">{{ $course->title }}</h2>
    <p class="text-gray-600 mb-2"><strong>Instructor:</strong> {{ $course->instructor->name }}</p>
    <p class="text-gray-600 mb-4">{{ $course->description }}</p>

    <h3 class="text-xl font-semibold mt-4">Learning Materials</h3>
    @if($course->materials->isEmpty())
        <p class="text-gray-600">No materials available for this course.</p>
    @else
        <ul class="mt-2">
            @foreach ($course->materials as $material)
                <li class="mb-2">
                    <a href="{{ asset('storage/' . $material->file_path) }}" class="text-blue-600 hover:underline" target="_blank">
                        {{ $material->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('student.courses.index') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Back to Courses
    </a>
</div>
@endsection
