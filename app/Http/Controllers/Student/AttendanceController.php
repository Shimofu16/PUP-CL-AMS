<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\AttendanceLog;
use App\Models\Computer;
use App\Models\SchoolYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Auth::user()->student->getScheduleBy('today');
        $computers = Computer::all();
        return view('AMS.backend.student-layouts.attendance.index', compact('schedules','computers'));
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
    public function show($choice)
    {
        return view('AMS.backend.student-layouts.attendance.show', compact('choice'));
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
                'computer_id' =>'required',
                'status' => 'required',
                'description' => 'required'
            ]);
            $sy= SchoolYear::where('is_active', 1)->first();
            AttendanceLog::create([
                'teacher_class_id' => $id,
                'student_id' => Auth::user()->student->id,
                'computer_id' => $request->computer_id,
                'sy_id' => $sy->id,
                'semester_id' => $sy->semester_id,
                'status' => $request->status,
                'description' => $request->description,
            ]);
            return redirect()->back()->with('successToast', 'Attendance successfully logged!');
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
