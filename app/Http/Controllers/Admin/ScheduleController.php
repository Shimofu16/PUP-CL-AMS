<?php

namespace App\Http\Controllers\Admin;


use App\Models\Section;
use App\Models\Subject;
use App\Models\Semester;
use App\Models\SchoolYear;
use App\Models\ScheduleDate;
use App\Models\TeacherClass;
use Illuminate\Http\Request;
use App\Models\FacultyMember;
use App\Http\Controllers\Controller;

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
        $semesters = Semester::all();
        return view('AMS.backend.admin-layouts.academics.schedule.index', compact('schedules', 'teachers', 'subjects', 'sections', 'semesters'));
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
    public function store(Request $request, $teacher_class_id)
    {
        try {
            $validatedData = $request->validate([
                'start_time' => 'required',
                'end_time' => 'required',
                'date' => 'required',
            ]);
            $key = 'successToast';
            $message = 'Schedule successfully added!';
            $sy = SchoolYear::where('is_active', 1)->first();
            $scheduleDates = ScheduleDate::with('schedule')
            ->whereHas('schedule', function ($query) use ($sy) {
                $query->where('sy_id', $sy->id)
                    ->where('semester_id', $sy->semester_id);
            })
            ->whereDate('date', $request->date)
            ->where(function ($query) use ($validatedData) {
                $query->where(function ($query) use ($validatedData) {
                    $query->where('start_time', '<=', $validatedData['start_time'])
                        ->where('end_time', '>=', $validatedData['start_time']);
                })->orWhere(function ($query) use ($validatedData) {
                    $query->where('start_time', '<=', $validatedData['end_time'])
                        ->where('end_time', '>=', $validatedData['end_time']);
                })->orWhere(function ($query) use ($validatedData) {
                    $query->where('start_time', '>=', $validatedData['start_time'])
                        ->where('start_time', '<=', $validatedData['end_time'])
                        ->orWhere('end_time', '>=', $validatedData['start_time'])
                        ->where('end_time', '<=', $validatedData['end_time']);
                });
            })
            ->get();

            // Check if there is a time conflict
            if ($scheduleDates->count() > 0) {
                $message = 'There is a conflict on Time for date ' . date('F d, Y', strtotime($request->date));
                $key = 'errorAlert';
            } else {
                ScheduleDate::create([
                    'teacher_class_id' => $teacher_class_id,
                    'date' =>  $request->date,
                    'start_time' => $validatedData['start_time'],
                    'end_time' => $validatedData['end_time'],
                ]);
            }
            return redirect()->back()->with($key, $message);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $schedule = TeacherClass::find($id);
            return view('AMS.backend.admin-layouts.academics.schedule.edit', compact('schedule'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $date = ScheduleDate::find($id);
            $date->update([
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'date' => $request->date,
            ]);
            return redirect()->back()->with('successToast', 'Schedule Updated Successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $date = ScheduleDate::find($id);
            $date->delete();
            return redirect()->back()->with('successToast', 'Schedule Deleted Successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }
}
