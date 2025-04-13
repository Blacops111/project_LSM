@extends('layouts.student-layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">{{ $assignment->title }}</h2>

    <p class="text-gray-700"><strong>Course:</strong> {{ $assignment->course->title }}</p>
    <p class="text-gray-700"><strong>Due Date:</strong> {{ $assignment->due_date }}</p>
    <p class="text-gray-700"><strong>Description:</strong> {{ $assignment->description }}</p>

    @if ($assignment->file)
        <p class="text-gray-700">
            <strong>Download File:</strong> 
            <a href="{{ asset('storage/' . $assignment->file) }}" class="text-blue-500" download>Click here</a>
        </p>
    @endif

    <h3 class="text-xl font-semibold mt-6">Submit Assignment</h3>

    @if($submission)
        <p class="text-green-600">You have already submitted this assignment.</p>
        <p><strong>Submitted File:</strong> <a href="{{ asset('storage/' . $submission->file) }}" class="text-blue-500" download>Download</a></p>
    @else
        <form action="{{ route('student.assignments.submit', $assignment->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            <label class="block mb-2 font-semibold">Upload Your Work:</label>
            <input type="file" name="submission_file" required class="border border-gray-300 p-2 w-full">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 mt-3 rounded hover:bg-green-600">
                Submit
            </button>
        </form>
    @endif
</div>
@endsection
