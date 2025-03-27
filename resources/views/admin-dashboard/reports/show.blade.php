@extends('layouts.admin-layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Report Details</h2>

    <div class="mb-4">
        <p class="text-lg"><strong>ID:</strong> {{ $report->id }}</p>
        <p class="text-lg"><strong>Type:</strong> {{ $report->type }}</p>
        <p class="text-lg"><strong>Description:</strong> {{ $report->description }}</p>
        <p class="text-lg"><strong>Generated On:</strong> {{ $report->created_at->format('d M Y, H:i A') }}</p>
    </div>

    <div class="mt-6">
        <a href="{{ route('reports.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back</a>
    </div>
</div>
@endsection
