@extends('layouts.admin-layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Student Details</h2>

    <div class="mb-4">
        <p class="text-lg"><strong>Name:</strong> {{ $student->name }}</p>
        <p class="text-lg"><strong>Email:</strong> {{ $student->email }}</p>
        
        <p class="text-lg"><strong>Enrolled Courses:</strong></p>
        <ul class="list-disc ml-6">
            @foreach ($student->courses as $course)
                <li>{{ $course->title }}</li>
            @endforeach
        </ul>
    </div>

    <h3 class="text-xl font-semibold mt-6 mb-2">Assignments</h3>
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">Title</th>
                <th class="border border-gray-300 px-4 py-2">Due Date</th>
                <th class="border border-gray-300 px-4 py-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($student->assignments as $assignment)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $assignment->title }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $assignment->due_date }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    {{ optional($assignment->pivot)->status ?? 'Pending' }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="border border-gray-300 px-4 py-2 text-center">No assignments found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-6">
        <a href="{{ route('students.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back</a>
    </div>
</div>
@endsection

