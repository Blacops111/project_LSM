@extends('layouts.admin-layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">Students</h2>
        <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add New Student</a>
    </div>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">#</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Email</th>
                <th class="border border-gray-300 px-4 py-2">Enrolled Courses</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
            <tr class="text-center">
                <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $student->name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $student->email }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    <ul class="list-disc ml-4">
                        @foreach ($student->courses as $course)
                            <li>{{ $course->title }}</li>
                        @endforeach
                    </ul>
                </td>
                <td class="border border-gray-300 px-4 py-2">
                    <a href="{{ route('students.show', $student->id) }}" class="text-blue-600 hover:underline">View</a> |
                    <a href="#" class="text-yellow-600 hover:underline">Edit</a> |
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="border border-gray-300 px-4 py-2 text-center">No students found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
