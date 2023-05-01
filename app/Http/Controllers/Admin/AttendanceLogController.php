<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttendanceLog;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* order by course */
        $attendance_logs = AttendanceLog::with(['teacherClass', 'student', 'computer', 'course'])->orderBy('course_id')->get();
        return view('AMS.backend.admin-layouts.reports.attendance.index', compact('attendance_logs'));
    }
    public function charts()
    {
        // Get the total number of students and attendance logs for the last 7 days
        $getTotalPerWeek = Course::withCount(['students', 'attendanceLogs' => function ($query) {
            $query->whereHas('teacherClass', function ($q) {

                $q->whereBetween('date', [now()->subDays(8), now()->addDay()]);
            });
        }])->get();
        // Get the total number of students and attendance logs for today only
        $getTotalToday  = Course::withCount(['students', 'attendanceLogs' => function ($query) {
            $query->whereHas('teacherClass', function ($q) {
                $q->whereDate('date', now());
            });
        }])->get();
        $getAll = Course::withCount(['students', 'attendanceLogs'])->get();
        return view('AMS.backend.admin-layouts.reports.attendance.show', compact('getTotalPerWeek', 'getTotalToday','getAll'));
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
    public function show(AttendanceLog $attendanceLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AttendanceLog $attendanceLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AttendanceLog $attendanceLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttendanceLog $attendanceLog)
    {
        //
    }
}
