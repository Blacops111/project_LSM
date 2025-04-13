@extends('layouts.student-layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Scheduled Online Classes</h2>

    @if($schedules->isEmpty())
        <p class="text-gray-600">No scheduled classes at the moment.</p>
    @else
        <div class="space-y-4">
            @foreach($schedules as $schedule)
                <div class="border p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">{{ $schedule->title }}</h3>
                    <p class="text-gray-600">Date: {{ $schedule->date }} | Time: {{ $schedule->time }}</p>

                    @if($schedule->meeting_link)
                        <a href="{{ $schedule->meeting_link }}" target="_blank" class="text-blue-500 underline">
                            Join Class
                        </a>
                    @else
                        <p class="text-red-500">Meeting link not available.</p>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
