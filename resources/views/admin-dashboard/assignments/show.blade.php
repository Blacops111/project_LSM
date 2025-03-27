@extends('layouts.admin-layout')

@section('content')
<div class="p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $assignment->title }}</h1>
    <p class="mt-2 text-gray-600 dark:text-gray-300">{{ $assignment->description }}</p>

    <div class="mt-4">
        <span class="font-semibold text-gray-700 dark:text-gray-300">Due Date:</span>
        <span class="text-red-500 font-bold">{{ $assignment->due_date }}</span>
    </div>

    <div class="mt-6 flex space-x-4">
        <a href="{{ route('assignments.edit', $assignment->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Edit</a>
        
        <form action="{{ route('assignments.destroy', $assignment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this assignment?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Delete</button>
        </form>

        <a href="{{ route('assignments.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Back to List</a>
    </div>
</div>
@endsection
