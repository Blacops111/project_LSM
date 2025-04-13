@extends('layouts.admin-layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Create Notification</h2>

    <form action="{{ route('notifications.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" class="w-full p-2 border border-gray-300 rounded mt-1" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Message</label>
            <textarea name="message" class="w-full p-2 border border-gray-300 rounded mt-1" rows="4" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Target Audience</label>
            <select name="target" class="w-full p-2 border border-gray-300 rounded mt-1">
                <option value="all">All Users</option>
                <option value="students">Students</option>
                <option value="teachers">Teachers</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Send Notification</button>
    </form>

    <div class="mt-4">
        <a href="{{ route('notifications.index') }}" class="text-gray-600 hover:underline">Back to Notifications</a>
    </div>
</div>
@endsection
