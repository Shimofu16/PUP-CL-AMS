<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($section_id = null)
    {
        $users = User::where('student_id', '!=', null)->get();
        $sections = Section::all();
        $section_name = null;
        $pageTitle = "Student`s Accounts";
        if ($section_id != null) {
            $section_name = Section::find($section_id)->section_name;
            $users = User::with('student')->whereHas('student', function ($query) use ($section_id) {
                $query->where('section_id', '=', $section_id);
            })->get();
        }
        return view('AMS.backend.admin-layouts.user.student.index', compact('users', 'sections', 'pageTitle', 'section_name'));
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
    public function show($id)
    {
        $user = User::find($id);
        $pageTitle = "Student - " . $user->student->getFullName();
        return view('AMS.backend.admin-layouts.user.show', compact('user', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        try {
            $user = Student::find($id);
            $user->update([
                'student_no' => $request->student_no,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'updated_at' => now()
            ]);
            $user->user->update([
                'email' => $request->email,
                'updated_at' => now()
            ]);
            return redirect()->back()->with('successToast', 'Student updated successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
