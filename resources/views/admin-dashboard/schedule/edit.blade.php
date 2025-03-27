@extends('layouts.admin-layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Create Class Schedule</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('schedule.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="course_id" class="block text-gray-700 font-medium">Select Course</label>
            <select name="course_id" id="course_id" class="w-full p-2 border border-gray-300 rounded">
                <option value="">-- Choose a Course --</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="date" class="block text-gray-700 font-medium">Date</label>
            <input type="date" name="date" id="date" class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div class="mb-4">
            <label for="time" class="block text-gray-700 font-medium">Time</label>
            <input type="time" name="time" id="time" class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div class="mb-4">
            <label for="link" class="block text-gray-700 font-medium">Meeting Link (Optional)</label>
            <input type="url" name="link" id="link" class="w-full p-2 border border-gray-300 rounded" placeholder="https://meeting-link.com">
        </div>

        <div class="flex justify-end">
            <a href="{{ route('schedule.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2">
                Cancel
            </a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Save Schedule
            </button>
        </div>
    </form>
</div>
@endsection
