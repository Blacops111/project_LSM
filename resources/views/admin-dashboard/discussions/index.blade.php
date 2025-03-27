@extends('layouts.admin-layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">Discussions</h2>
        <a href="{{ route('discussions.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            New Discussion
        </a>
    </div>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">Title</th>
                <th class="border border-gray-300 px-4 py-2">Author</th>
                <th class="border border-gray-300 px-4 py-2">Created At</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($discussions as $discussion)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $discussion->title }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $discussion->user->name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $discussion->created_at->format('d M Y') }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    <a href="{{ route('discussions.show', $discussion->id) }}" class="text-blue-600 hover:underline">View</a> |
                    <a href="{{ route('discussions.edit', $discussion->id) }}" class="text-yellow-600 hover:underline">Edit</a> |
                    <form action="{{ route('discussions.destroy', $discussion->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
