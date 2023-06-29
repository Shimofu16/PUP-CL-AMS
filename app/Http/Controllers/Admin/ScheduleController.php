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
    public function store(Request $request)
    {
        try {
            $teacher_class_id =  TeacherClass::create([
                'teacher_id' => $request->teacher_id,
                'subject_id' => $request->subject_id,
                'section_id' => $request->section_id,
                'day' => $request->day,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'sy_id' => SchoolYear::where('is_active', 1)->first()->id,
                'semester_id' => $request->semester_id,
            ])->id;

            $dates = $this->getDates($request->start_date, $request->end_date, $request->day);
            foreach ($dates as $date) {
                ScheduleDate::create([
                    'teacher_class_id' => $teacher_class_id,
                    'date' => $date,
                ]);
            }
            return redirect()->back()->with('successToast', 'Schedule Added Successfully!');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }
    private function getDates($start_date, $end_date, $day)
    {
        $dates = [];
        $start_date = new \DateTime($start_date);
        $end_date = new \DateTime($end_date);
        $interval = \DateInterval::createFromDateString('1 day');
        $period = new \DatePeriod($start_date, $interval, $end_date);
        foreach ($period as $dt) {
            if ($dt->format("l") === $day) {
                $dates[] = $dt->format("Y-m-d");
            }
        }
        return $dates;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $schedule = TeacherClass::find($id);
            $dates = ScheduleDate::where('teacher_class_id', $id)->get();
            return view('AMS.backend.admin-layouts.academics.schedule.show', compact('schedule', 'dates'));
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
            $schedule = TeacherClass::find($id);
            $date_id = $request->date_id;
            $date = ScheduleDate::find($date_id);
            $date->date = $request->new_date;
            $date->save();
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
            TeacherClass::find($id)->delete();
            return redirect()->back()->with('successToast', 'Schedule Deleted Successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }
}
