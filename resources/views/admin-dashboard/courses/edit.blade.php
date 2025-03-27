@extends('layouts.admin-layout')
@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold">Edit Course</h2>
    <form action="{{ route('courses.update', $course->id) }}" method="POST" class="mt-4">
        @csrf @method('PUT')
        <label class="block">Title:</label>
        <input type="text" name="title" value="{{ $course->title }}" class="w-full border p-2">
        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
