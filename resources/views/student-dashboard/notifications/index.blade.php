@extends('layouts.student-layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Notifications</h2>

    @if($notifications->isEmpty())
        <p class="text-gray-600">No new notifications.</p>
    @else
        <div class="space-y-4">
            @foreach($notifications as $notification)
                <div class="border p-4 rounded-lg shadow @if(!$notification->read_at) bg-gray-100 @endif">
                    <h3 class="text-lg font-semibold">{{ $notification->title }}</h3>
                    <p class="text-gray-600">{{ $notification->message }}</p>
                    <p class="text-sm text-gray-500">Received on: {{ $notification->created_at->format('M d, Y h:i A') }}</p>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
