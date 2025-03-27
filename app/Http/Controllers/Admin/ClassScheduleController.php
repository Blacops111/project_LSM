<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassScheduleController extends Controller
{
    public function index()
    {
        return view('admin-dashboard.schedule.index'); // View class schedules
    }

    public function create()
    {
        return view('admin-dashboard.schedule.create'); // Show form to create schedule
    }

    public function store(Request $request)
    {
        // Handle storing schedule logic
    }

    public function edit($id)
    {
        return view('admin-dashboard.schedule.edit', compact('id')); // Edit schedule form
    }

    public function update(Request $request, $id)
    {
        // Handle updating schedule logic
    }

    public function destroy($id)
    {
        // Handle deleting schedule logic
    }
}
