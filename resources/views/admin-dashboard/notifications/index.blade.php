@extends('layouts.admin-layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">Notifications</h2>
        <a href="{{ route('notifications.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create Notification</a>
    </div>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">#</th>
                <th class="border border-gray-300 px-4 py-2">Title</th>
                <th class="border border-gray-300 px-4 py-2">Message</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notifications as $notification)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $notification->title }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ Str::limit($notification->message, 50) }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    <a href="{{ route('notifications.show', $notification->id) }}" class="text-blue-600 hover:underline">View</a> |
                    <a href="{{ route('notifications.edit', $notification->id) }}" class="text-yellow-600 hover:underline">Edit</a> |
                    <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST" class="inline">
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

