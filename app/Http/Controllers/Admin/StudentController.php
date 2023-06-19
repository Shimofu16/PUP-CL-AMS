<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($section_id = null)
    {
        /* get the current route name */
        $currentRouteName = app('router')->getRoutes()->match(app('request')->create(url()->current()))->getName();
        $students = Student::all();
        $sections = Section::all();
        $section_name = null;
        $pageTitle = "Student`s Informations";
        if ($currentRouteName == 'admin.user.account.student.index') {
            $pageTitle = "Student`s Accounts";
            $students = User::with('student')->where('student_id', '!=', null)->get();
        }

        if ($section_id != null) {
            $section_name = Section::find($section_id)->section_name;
            $students = Student::with('section')->where('section_id', $section_id)->get();
            if ($currentRouteName == 'admin.user.account.student.index') {
                $students = User::with('student')->whereHas('student', function ($query) use ($section_id) {
                    $query->where('section_id', '=', $section_id);
                })->get();
            }
        }


        return view('AMS.backend.admin-layouts.user.student.index', compact('students', 'sections', 'pageTitle', 'section_name'));
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $student = Student::find($id);
            $student->update([
                'student_no' => $request->student_no,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'section_id' => $request->section_id,
                'updated_at' => now()
            ]);
            $student->user->update([
                'email' => $request->email,
                'updated_at' => now()
            ]);
            return redirect()->back()->with('successToast', 'Student updated successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
    public function resetPassword($id)
    {
        try {
            $user = User::find($id);
            $user->update([
                'password' => Hash::make('PUPCPassword'),
            ]);
            return back()->with('successToast', 'User password successfully reset!');
        } catch (\Throwable $th) {
            return back()->with('errorAlert', $th->getMessage());
        }
    }
    public function resetAllPassword()
    {
        try {
            $users = User::where('student_id', '!=', null)->get();
            foreach ($users as $user) {
                $user->update([
                    'password' => Hash::make('PUPCPassword'),
                ]);
            }
            return back()->with('successToast', 'All user password successfully reset!');
        } catch (\Throwable $th) {
            return back()->with('errorAlert', $th->getMessage());
        }
    }
}
