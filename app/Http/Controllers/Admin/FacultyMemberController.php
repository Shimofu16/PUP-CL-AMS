<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\FacultyMember;
use App\Models\User;
use Illuminate\Http\Request;

class FacultyMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('faculty_member_id', '!=', null)->get();
        $pageTitle = "Faculty";
        return view('AMS.backend.admin-layouts.user.index', compact('users', 'pageTitle'));
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
        $departments = Department::all();
        $pageTitle = "Faculty - " . $user->facultyMember->getFullName();
        return view('AMS.backend.admin-layouts.user.show', compact('user', 'departments', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        try {
            $user = FacultyMember::find($id);
            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'department_id' => $request->department_id,
                'updated_at' => now()
            ]);
            $user->user->update([
                'email' => $request->email,
                'updated_at' => now()
            ]);
            return back()->with('successToast', 'Faculty member updated successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FacultyMember $facultyMember)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->update([
                'status' => "offline",
            ]);
            return back()->with('successToast', 'User successfully logout!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
