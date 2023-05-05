<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FacultyMember;
use App\Models\Section;
use App\Models\Subject;
use App\Models\TeacherClass;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = TeacherClass::all();
        $teachers = FacultyMember::with('department')->where('department_id', 2)->get();
        $subjects = Subject::all();
        $sections = Section::all();
        return view('AMS.backend.admin-layouts.academics.schedule.index',compact('schedules','teachers','subjects','sections'));
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
        try {
            TeacherClass::create([
                'teacher_id' => $request->teacher_id,
                'subject_id' => $request->subject_id,
                'section_id' => $request->section_id,
                'date' => $request->date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);
            return redirect()->back()->with('successToast', 'Schedule Added Successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
            $schedule = TeacherClass::find($id);
            $schedule->update([
                'teacher_id' => $request->teacher_id,
                'subject_id' => $request->subject_id,
                'section_id' => $request->section_id,
                'date' => $request->date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);
            return redirect()->back()->with('successToast', 'Schedule Updated Successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            TeacherClass::find($id)->delete();
            return redirect()->back()->with('successToast', 'Schedule Deleted Successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
