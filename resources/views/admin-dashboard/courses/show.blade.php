@extends('layouts.admin-layout')
@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold">Course Details</h2>
    <p><strong>Title:</strong> {{ $course->title }}</p>
    <a href="{{ route('courses.index') }}" class="mt-4 bg-gray-500 text-white px-4 py-2 rounded">Back</a>
</div>
@endsection
