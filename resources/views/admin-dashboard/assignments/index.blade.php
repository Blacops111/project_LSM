@extends('layouts.admin-layout')

@section('content')
<div class="p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Assignments</h1>
    <a href="{{ route('assignments.create') }}" class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Create New Assignment</a>

    <div class="mt-6">
        <table class="min-w-full bg-white dark:bg-gray-700 shadow-md rounded-lg">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Title</th>
                    <th class="py-2 px-4 border-b">Due Date</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assignments as $assignment)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $assignment->title }}</td>
                    <td class="py-2 px-4 border-b">{{ $assignment->due_date }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('assignments.show', $assignment->id) }}" class="text-blue-500">View</a>
                        <a href="{{ route('assignments.edit', $assignment->id) }}" class="text-yellow-500 ml-2">Edit</a>
                        <form action="{{ route('assignments.destroy', $assignment->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 ml-2" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
