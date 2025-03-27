@extends('layouts.admin-layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold">Generated Report</h2>

    <p class="mt-4"><strong>Report Type:</strong> {{ ucfirst($data['type']) }}</p>
    <p><strong>From:</strong> {{ $data['from_date'] }}</p>
    <p><strong>To:</strong> {{ $data['to_date'] }}</p>
    <p><strong>Generated At:</strong> {{ $data['generated_at'] }}</p>

    <div class="mt-6">
        <a href="{{ route('reports.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back</a>
    </div>
</div>
@endsection
