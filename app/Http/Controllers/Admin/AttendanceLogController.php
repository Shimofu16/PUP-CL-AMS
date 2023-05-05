<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttendanceLog;
use App\Models\Course;
use App\Models\SchoolYear;
use App\Models\Semester;
use Illuminate\Http\Request;

class AttendanceLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendance_logs = AttendanceLog::with(['teacherClass', 'student', 'computer', 'course'])
        ->where('sy_id', SchoolYear::where('is_active', true)->first()->id)
        ->where('semester_id', SchoolYear::where('is_active', true)->first()->semester_id)
        ->get()
            ->sortBy([
                ['course.name', 'asc'],
                ['student.last_name', 'asc'],
                ['teacherClass.date', 'desc']
            ], SORT_REGULAR, false)
            ->values();

        return view('AMS.backend.admin-layouts.reports.attendance.index', compact('attendance_logs'));
    }
    public function charts()
    {
        // Get the total number of students and attendance logs for the last 7 days
        $getTotalPerWeek = Course::withCount(['students' => function ($query) {
            $query->whereHas('attendanceLogs', function ($que) {
                $que->whereHas('teacherClass', function ($q) {
                    $q->whereBetween('date', [now()->subDays(8), now()->addDay()]);
                });
            });
        }])->having('students_count', '>', 0)->get();
        // Get the total number of students and attendance logs for today only
        $getTotalToday  = Course::withCount(['students' => function ($query) {
            $query->whereHas('attendanceLogs', function ($que) {
                $que->whereHas('teacherClass', function ($q) {
                    $q->whereDate('date', now());
                });
            });
        }])->having('students_count', '>', 0)->get();
        $currentYear = SchoolYear::where('is_active', 1)->first()->id;
        $getTotalPerSemester = Semester::withCount([
            'attendanceLogs' => function ($query) use ($currentYear) {
                $query->where('sy_id', $currentYear);
            }
        ])->having('attendance_logs_count', '>', 0)->get();
        $getTotalPerSchoolYear = SchoolYear::withCount([
            'attendanceLogs' => function ($query) {
                $query->whereHas('semester', function ($q) {
                    $q->where('is_active', 1);
                });
            }
        ])->having('attendance_logs_count', '>', 0)->get();
        return view('AMS.backend.admin-layouts.reports.attendance.show', compact('getTotalPerWeek', 'getTotalToday', 'getTotalPerSchoolYear','getTotalPerSemester'));
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
