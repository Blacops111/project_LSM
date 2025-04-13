<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    /**
     * Display a listing of schedules.
     */
    public function index()
    {
        $schedules = Schedule::all(); // Fetch all schedules
        return view('admin-dashboard.schedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new schedule.
     */
    public function create()
    {
        return view('admin-dashboard.schedule.create');
    }

    /**
     * Store a newly created schedule in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        Schedule::create([
            'title' => $request->title,
            'date' => $request->date,
            'time' => $request->time,
        ]);

        return redirect()->route('schedule.index')->with('success', 'Schedule created successfully.');
    }

    /**
     * Show the form for editing a schedule.
     */
    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('admin-dashboard.schedule.edit', compact('schedule'));
    }

    /**
     * Update the schedule.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        $schedule = Schedule::findOrFail($id);
        $schedule->update([
            'title' => $request->title,
            'date' => $request->date,
            'time' => $request->time,
        ]);

        return redirect()->route('schedule.index')->with('success', 'Schedule updated successfully.');
    }

    /**
     * Remove the schedule from storage.
     */
    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('schedule.index')->with('success', 'Schedule deleted successfully.');
    }
}
