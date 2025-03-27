@extends('layouts.admin-layout')

@section('content')
<div class="p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Courses</h1>
    <p class="mt-2 text-gray-600 dark:text-gray-300">Manage all courses here.</p>

    <a href="{{ route('courses.create') }}" class="inline-block px-4 py-2 mt-4 bg-blue-500 text-white rounded hover:bg-blue-600">
        Add New Course
    </a>

    <table class="mt-6 w-full border-collapse border border-gray-300 dark:border-gray-600">
        <thead>
            <tr class="bg-gray-100 dark:bg-gray-700">
                <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">#</th>
                <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Title</th>
                <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">{{ $course->title }}</td>
                    <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">
                        <a href="{{ route('courses.edit', $course->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded">Edit</a>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
