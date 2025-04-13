@extends('layouts.admin-layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">Class Schedules</h2>
        <a href="{{ route('schedule.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add New Schedule</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">Title</th>
                <th class="border border-gray-300 px-4 py-2">Date</th>
                <th class="border border-gray-300 px-4 py-2">Time</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule)
            <tr class="text-center">
                <td class="border border-gray-300 px-4 py-2">{{ $schedule->title }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $schedule->date }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $schedule->time }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    <a href="{{ route('schedule.edit', $schedule->id) }}" class="text-yellow-600 hover:underline">Edit</a> |
                    <form action="{{ route('schedule.destroy', $schedule->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($schedules->isEmpty())
        <p class="text-center text-gray-500 mt-4">No schedules found.</p>
    @endif
</div>
@endsection
