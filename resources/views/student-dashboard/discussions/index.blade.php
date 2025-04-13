@extends('layouts.student-layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Discussion Forums</h2>

    <a href="{{ route('student.discussions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4 inline-block">Start a Discussion</a>

    @if($discussions->isEmpty())
        <p class="text-gray-600">No discussions available yet.</p>
    @else
        <div class="space-y-4">
            @foreach($discussions as $discussion)
                <div class="border p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">
                        <a href="{{ route('student.discussions.show', $discussion->id) }}" class="text-blue-500">
                            {{ $discussion->title }}
                        </a>
                    </h3>
                    <p class="text-gray-600">Posted by: {{ $discussion->user->name }} | {{ $discussion->created_at->diffForHumans() }}</p>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
