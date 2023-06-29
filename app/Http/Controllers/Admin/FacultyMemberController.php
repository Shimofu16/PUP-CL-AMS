<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\FacultyMember;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Termwind\Components\Dd;

class FacultyMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* get the current route name */
        $currentRouteName = app('router')->getRoutes()->match(app('request')->create(url()->current()))->getName();

        if ($currentRouteName == "admin.user.account.faculty.index") {
            $users = User::where('faculty_member_id', '!=', null)->get();
            $pageTitle = "Faculty";
            $departments = Department::all();
            $facultyMembers = FacultyMember::whereDoesntHave('user')->get();
            $roles = Role::all();
            return view('AMS.backend.admin-layouts.user.faculty.index', compact('users', 'departments', 'facultyMembers', 'roles', 'pageTitle'));
        }
        if ($currentRouteName == "admin.user.information.faculty.index") {
            $facultyMems = FacultyMember::all();
            $pageTitle = "Faculty";
            $departments = Department::all();
            $facultyMembers = FacultyMember::whereDoesntHave('user')->get();
            $roles = Role::all();
            return view('AMS.backend.admin-layouts.user.faculty.index', compact('facultyMems', 'departments', 'facultyMembers', 'roles', 'pageTitle'));
        }
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
        /* get the previues route name */
        $previousRouteName = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
        if ($previousRouteName == "admin.user.account.faculty.index") {
            try {
                $rules = [
                    'faculty_member_id' => 'required|integer',
                    'password' => 'required|string|min:8',
                    'password_confirmation' => 'required|string|min:8|same:password',
                ];
                $request->validate($rules);
                $faculty = FacultyMember::find($request->faculty_member_id);
                $user = User::create([
                    'email' => $faculty->email,
                    'password' => Hash::make($request->password),
                    'role_id' => $request->role_id,
                    'faculty_member_id' => $request->faculty_member_id,
                    'created_at' => now(),
                ]);
                return back()->with('successToast', 'Faculty member created successfully!');
            } catch (\Throwable $th) {
                return back()->with('errorAlert', $th->getMessage());
            }
        }
        if ($previousRouteName == "admin.user.information.faculty.index") {
            try {
                $rules = [
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users,email',
                    'phone' => 'required|string|max:11',
                    'department_id' => 'required|integer',
                ];
                $request->validate($rules);
                FacultyMember::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'department_id' => $request->department_id,
                    'created_at' => now()
                ]);
                return back()->with('successToast', 'Faculty member created successfully!');
            } catch (\Throwable $th) {
                return back()->with('errorAlert', $th->getMessage());
            }
        }
        return back()->with('errorAlert', 'Something went wrong!');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $rules = [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email',
                'phone' => 'required|string|max:11',
                'department_id' => 'required|integer',
            ];
            $user = User::find($id);
            if ($user->email == $request->email) {
                $rules['email'] = 'required|string|email|max:255';
            }
            $request->validate($rules);
            $user->facultyMember->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'department_id' => $request->department_id,
                'updated_at' => now()
            ]);
            $user->update([
                'email' => $request->email,
                'updated_at' => now()
            ]);
            return back()->with('successToast', 'Faculty member updated successfully!');
        } catch (\Throwable $th) {
            return back()->with('errorAlert', $th->getMessage());
        }
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
            return back()->with('errorAlert', $th->getMessage());
        }
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
            $users = User::where('faculty_member_id', '!=', null)->get();
            foreach ($users as $user) {
                $user->update([
                    'force_change_password' => true,
                ]);
            }
            return back()->with('successToast', 'All user password successfully reset!');
        } catch (\Throwable $th) {
            return back()->with('errorAlert', $th->getMessage());
        }
    }
}
