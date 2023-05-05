<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\ScheduleRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacherClasses = Auth::user()->facultyMember->teacherClasses->sortBy('date', SORT_REGULAR, true);
        return view('AMS.backend.faculty-layouts.schedule.index', compact('teacherClasses'));
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
            $schedule = Auth::user()->facultyMember->teacherClasses()->findOrFail($id);
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
            $request->validate([
                'date' => 'required|date',
                'start_time' => 'required|',
                'end_time' => 'required|after:start_time',
                'reason' => 'required|string',
            ]);
            $date = Carbon::createFromFormat('Y-m-d', $request->date,);
            $start_time = Carbon::parse($request->start_time);
            $end_time = Carbon::parse($request->end_time);

            $start_datetime = $date->setTime($start_time->hour, $start_time->minute, $start_time->second);
            $end_datetime = $date->setTime($end_time->hour, $end_time->minute, $end_time->second);

            $request->merge([
                'start_time' => $start_datetime,
                'end_time' => $end_datetime,
            ]);


            $schedule = Auth::user()->facultyMember->teacherClasses()->findOrFail($id);
            ScheduleRequest::create([
                'teacher_class_id' => $schedule->id,
                'date' => $request->date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'reason' => $request->reason,
            ]);

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
