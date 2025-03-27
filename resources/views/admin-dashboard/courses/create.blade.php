@extends('layouts.admin-layout')
@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold">Create Course</h2>
    <form action="{{ route('courses.store') }}" method="POST" class="mt-4">
        @csrf
        <label class="block">Title:</label>
        <input type="text" name="title" class="w-full border p-2">
        <button type="submit" class="mt-4 bg-green-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection
