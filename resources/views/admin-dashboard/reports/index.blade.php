@extends('layouts.admin-layout')

@section('content')

<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Generate Reports</h2>

    <form action="{{ route('reports.generate') }}" method="GET" class="mb-6">
        <div class="mb-4">
            <label for="type" class="block font-medium">Report Type:</label>
            <select name="type" id="type" class="w-full border-gray-300 rounded-lg">
                <option value="students">Student Performance</option>
                <option value="courses">Course Enrollment</option>
                <option value="assignments">Assignments Completion</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="from_date" class="block font-medium">From Date:</label>
            <input type="date" name="from_date" class="w-full border-gray-300 rounded-lg">
        </div>

        <div class="mb-4">
            <label for="to_date" class="block font-medium">To Date:</label>
            <input type="date" name="to_date" class="w-full border-gray-300 rounded-lg">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Generate Report
        </button>
    </form>

    @if(isset($reportData))
    <h3 class="text-xl font-semibold mt-6 mb-2">Report Results</h3>
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">#</th>
                <th class="border border-gray-300 px-4 py-2">Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reportData as $index => $data)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $data }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
