<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\AttendanceLog;
use App\Models\ScheduleDate;
use App\Models\ScheduleRequest;
use App\Models\SchoolYear;
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
    public function show(string $id, $date_id = null)
    {
        try {
            $schedule = Auth::user()->facultyMember->teacherClasses()->findOrFail($id);
            $section = $schedule->section->section_name;
            $subject = $schedule->subject->subject_name;
            if ($date_id) {
                $ScheduleDate = ScheduleDate::findOrFail($date_id);
            }
            $ScheduleDate = ScheduleDate::whereDate('date', now())->first();
            if ($ScheduleDate) {
            }
            return view('AMS.backend.faculty-layouts.schedule.show', compact('schedule', 'section', 'subject', 'ScheduleDate'));
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
    public function update($type, string $id)
    {
        try {
            $sy = SchoolYear::where('is_active', 1)->first();
            $schedule = ScheduleDate::findOrFail($id);
            if ($type === "in") {
                AttendanceLog::create([
                    'teacher_class_id' => $schedule->teacher_class_id,
                    'faculty_member_id' => Auth::user()->faculty_member_id,
                    'sy_id' => $sy->id,
                    'semester_id' => $sy->semester_id,
                    'remarks' => 'present',
                    'time_in' => now()
                ]);
            } elseif ($type === "out") {
                $log = AttendanceLog::where('teacher_class_id', $schedule->teacher_class_id)
                    ->where('faculty_member_id', Auth::user()->faculty_member_id)
                    ->where('sy_id', $sy->id)
                    ->where('semester_id', $sy->semester_id)
                    ->whereDate('created_at', now())
                    ->first();
                $log->update([
                    'time_out' => now()
                ]);
            }
            return redirect()->back()->with('successToast', 'Successfully Taken an attendance for ' . $schedule->schedule->subject->name);
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }
    // public function update(Request $request, string $id)
    // {
    //     $request->validate([
    //         'date' => 'required|date',
    //         'start_time' => 'required|',
    //         'end_time' => 'required|after:start_time',
    //         'reason' => 'required|string',
    //     ]);
    //     try {
    //         $date = Carbon::createFromFormat('Y-m-d', $request->date,);
    //         $start_time = Carbon::parse($request->start_time);
    //         $end_time = Carbon::parse($request->end_time);

    //         $start_datetime = $date->setTime($start_time->hour, $start_time->minute, $start_time->second);
    //         $end_datetime = $date->setTime($end_time->hour, $end_time->minute, $end_time->second);

    //         $request->merge([
    //             'start_time' => $start_datetime,
    //             'end_time' => $end_datetime,
    //         ]);


    //         $schedule = Auth::user()->facultyMember->teacherClasses()->findOrFail($id);
    //         ScheduleRequest::create([
    //             'teacher_class_id' => $schedule->id,
    //             'date' => $request->date,
    //             'start_time' => $request->start_time,
    //             'end_time' => $request->end_time,
    //             'reason' => $request->reason,
    //         ]);

    //         return redirect()->back()->with('successToast', 'Schedule updated successfully.');
    //     } catch (\Throwable $th) {
    //         return redirect()->back()->with('errorAlert', $th->getMessage());
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function reschedule(Request $request)
    {
        try {
            // dd($request->all());
            if ($request->has('reason') && $request->reason != null) {
                ScheduleRequest::create([
                    'date_id' => $request->date_id,
                    'new_date' => $request->new_date,
                    'start_time' => $request->start_time,
                    'end_time' => $request->end_time,
                    'reason' => $request->reason,
                ]);
            }
            ScheduleRequest::create([
                'date_id' => $request->date_id,
                'new_date' => $request->new_date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);
            return redirect()->back()->with('successToast', 'Request sent');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }
}
