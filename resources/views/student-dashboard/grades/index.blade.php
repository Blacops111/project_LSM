@extends('layouts.student-layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">My Grades</h2>

    @if($grades->isEmpty())
        <p class="text-gray-600">No grades available yet.</p>
    @else
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2 text-left">Assignment</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Course</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Grade</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Feedback</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grades as $grade)
                    <tr class="border border-gray-300">
                        <td class="border border-gray-300 px-4 py-2">{{ $grade->assignment->title }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $grade->assignment->course->title }}</td>
                        <td class="border border-gray-300 px-4 py-2 font-bold">{{ $grade->score }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $grade->feedback ?? 'No feedback provided' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
