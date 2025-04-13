@extends('layouts.student-layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Assignments</h2>

    @if($assignments->isEmpty())
        <p class="text-gray-600">No assignments available.</p>
    @else
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Title</th>
                    <th class="border border-gray-300 px-4 py-2">Course</th>
                    <th class="border border-gray-300 px-4 py-2">Due Date</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                    <th class="border border-gray-300 px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assignments as $assignment)
                    <tr class="text-center">
                        <td class="border border-gray-300 px-4 py-2">{{ $assignment->title }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $assignment->course->title }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $assignment->due_date }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            @if(now() > $assignment->due_date)
                                <span class="text-red-500">Overdue</span>
                            @else
                                <span class="text-green-500">Open</span>
                            @endif
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('student.assignments.show', $assignment->id) }}" 
                               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                View
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
