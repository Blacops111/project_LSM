@extends('layouts.admin-layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Edit Notification</h2>

    <form action="{{ route('notifications.update', $notification->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" value="{{ $notification->title }}" class="w-full p-2 border border-gray-300 rounded mt-1" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Message</label>
            <textarea name="message" class="w-full p-2 border border-gray-300 rounded mt-1" rows="4" required>{{ $notification->message }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Target Audience</label>
            <select name="target" class="w-full p-2 border border-gray-300 rounded mt-1">
                <option value="all" {{ $notification->target == 'all' ? 'selected' : '' }}>All Users</option>
                <option value="students" {{ $notification->target == 'students' ? 'selected' : '' }}>Students</option>
                <option value="teachers" {{ $notification->target == 'teachers' ? 'selected' : '' }}>Teachers</option>
            </select>
        </div>

        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Update Notification</button>
    </form>

    <div class="mt-4">
        <a href="{{ route('notifications.index') }}" class="text-gray-600 hover:underline">Back to Notifications</a>
    </div>
</div>
@endsection

