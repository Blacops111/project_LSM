@extends('layouts.student-layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">{{ $discussion->title }}</h2>
    <p class="text-gray-600 mb-4">Started by: {{ $discussion->user->name }} | {{ $discussion->created_at->diffForHumans() }}</p>
    <div class="border p-4 rounded-lg shadow mb-6">
        <p>{{ $discussion->content }}</p>
    </div>

    <h3 class="text-lg font-semibold mb-2">Replies</h3>

    @if($discussion->replies->isEmpty())
        <p class="text-gray-600">No replies yet. Be the first to reply!</p>
    @else
        <div class="space-y-4">
            @foreach($discussion->replies as $reply)
                <div class="border p-4 rounded-lg shadow">
                    <p class="font-semibold">{{ $reply->user->name }} <span class="text-gray-500 text-sm">({{ $reply->created_at->diffForHumans() }})</span></p>
                    <p>{{ $reply->content }}</p>
                </div>
            @endforeach
        </div>
    @endif

    <h3 class="text-lg font-semibold mt-6">Add a Reply</h3>
    <form action="{{ route('student.discussions.reply', $discussion->id) }}" method="POST" class="mt-4">
        @csrf
        <textarea name="content" class="w-full border p-2 rounded-lg" rows="3" placeholder="Write your reply..."></textarea>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-2">Reply</button>
    </form>
</div>
@endsection
