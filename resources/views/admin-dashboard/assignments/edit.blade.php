@extends('layouts.admin-layout')

@section('content')
<div class="p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Edit Assignment</h1>

    <form action="{{ route('assignments.update', $assignment->id) }}" method="POST" class="mt-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Title</label>
            <input type="text" name="title" id="title" value="{{ $assignment->title }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Description</label>
            <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ $assignment->description }}</textarea>
        </div>

        <div class="mb-4">
            <label for="due_date" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Due Date</label>
            <input type="date" name="due_date" id="due_date" value="{{ $assignment->due_date }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">Update Assignment</button>
        <a href="{{ route('assignments.index') }}" class="ml-2 text-gray-600 dark:text-gray-300 hover:underline">Cancel</a>
    </form>
</div>
@endsection
