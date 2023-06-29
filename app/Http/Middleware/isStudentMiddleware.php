<?php

namespace App\Http\Middleware;

use App\Models\Student;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isStudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->role->name !== 'student') {
            return redirect()->back()->with('errorAlert', 'You are not authorized to access this page');
        }
        // check if the scheduled date is equal to the same date now.
        $student = Student::find(Auth::user()->student_id);
        // check if the scheduled date is equal to the same date now.
        $hasScheduleCounter = 0;
        foreach ($student->section->schedules as $schedule) {
            if ($schedule->checkIfStudentHasScheduleToday()) {
                $hasScheduleCounter++;
            }
        }
        if ($hasScheduleCounter === 0) {
            // remove last_activity from session
            $request->session()->forget(Auth::id() . "_last_activity");
            // set the user's status to offline
            Auth::user()->status = "offline";
            Auth::user()->save();
            //regenerate   session
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            // logout the user
            Auth::logout();

            return redirect()->route('home.index')->with('errorAlert', 'You have no schedule today');
        }


        return $next($request);
    }
}
