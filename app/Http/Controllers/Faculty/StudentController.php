<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        $courses = Course::all();
        $sections = Section::all();
        return view('AMS.backend.faculty-layouts.student.index', compact('students','courses','sections'));
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
                Student::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'roll_number' => $request->roll_number,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'department_id' => $request->department_id,
                ]);
                return redirect()->back()->with('successToast', 'Student created successfully');
            } catch (\Throwable $th) {
                return redirect()->back()->with('errorAlert', $th->getMessage());
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
