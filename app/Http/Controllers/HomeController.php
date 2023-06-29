<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\SchoolYear;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /* generate a home function and add comment */
    public function home()
    {
        return view('AMS.frontend.home.index');
    }
    public function register(Request $request)
    {

        $request->validate([
            'student_no' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:students,email',
            'date_of_birth' => 'required|date',
            'phone' => 'required',
            'gender' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required|same:password',
            'section_id' => 'required',
            'section_id' => 'required',
        ]);
        try {
            $id =  Student::create([
                'student_no' => $request->student_no,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => Str::lower($request->email),
                'date_of_birth' => $request->date_of_birth,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'address' => $request->address,
                'section_id' => $request->section_id,
                'course_id' => Section::find($request->section_id)->course->id,
                'sy_id' => SchoolYear::where('is_active', true)->first()->id,
            ])->id;
            User::create([
                'email' => Str::lower($request->email),
                'password' => Hash::make($request->password),
                'role_id' => 4,
                'student_id' => $id,
            ]);
            return redirect()->back()->with('successToast', 'Registration Successful');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }
    public function registrationForm()
    {
        $sections = Section::all();
        return view('AMS.frontend.register.index', compact('sections'));
    }
    public function loginForm()
    {
        return view('AMS.frontend.login.index');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            // Check if the user is a student and has a schedule today
            if (Auth::user()->role->name === 'student') {
                $student = Student::find(Auth::user()->student_id);
                $hasScheduleCounter = 0;
                // dd($student->section->schedules);
                foreach ($student->section->schedules as $schedule) {
                    if ($schedule->checkIfStudentHasScheduleToday()) {
                        $hasScheduleCounter++;
                    }

                }
                if ($hasScheduleCounter === 0) {
                    Auth::logout();
                    return redirect()->back()->with('errorAlert', 'You have no schedule today');
                }
            }

            // Authentication was successful...
            Auth::user()->status = "online";
            Auth::user()->save();

            Log::create([
                'user_id' => Auth::id(),
                'action' => 'login',
                'time_in' => now(),
            ]);

            // Save last_activity into session
            $request->session()->regenerate();
            $request->session()->put(Auth::id() . '_last_activity', now());

            // Redirect users based on their roles
            if (Auth::user()->force_change_password) {
                return redirect()->intended(route(Auth::user()->role->name.'.change-password.index'));
            }
            switch (Auth::user()->role->name) {
                case 'admin':

                    return redirect()->intended(route('admin.dashboard.index'));
                case 'faculty':
                    return redirect()->intended(route('faculty.dashboard.index'));
                case 'student':
                    return redirect()->intended(route('student.dashboard.index'));
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        // remove last_activity from session
        $request->session()->forget(Auth::id() . "_last_activity");
        // set the user's status to offline
        Auth::user()->status = "offline";
        Auth::user()->save();
        // create a log
        $log = Log::where('user_id', Auth::id())
            ->whereNull('time_out')
            ->latest()
            ->first();

        $log->update([
            'time_out' => now(),
        ]);
        //regenerate   session
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // logout the user
        Auth::logout();

        return redirect()->route('home.index');
    }
}
