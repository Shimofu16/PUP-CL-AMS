<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\ScheduleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Auth::user()->facultyMember->schedules->sortBy('date', SORT_REGULAR, true);
        return view('AMS.backend.faculty-layouts.schedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $schedule = Auth::user()->facultyMember->schedules()->findOrFail($id);
            $section = $schedule->section->section_name;
            $subject = $schedule->subject->subject_name;
            return view('AMS.backend.faculty-layouts.schedule.show', compact('schedule', 'section', 'subject'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            dd($request->all());
            $schedule = Auth::user()->facultyMember->schedules()->findOrFail($id);
            $latestScheduleRequest = $schedule->scheduleRequests()->latest()->first();

            dd($latestScheduleRequest);

            return redirect()->back()->with('successToast', 'Schedule updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
