<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\TeacherClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($filter = null)
    {
        try {

            $filter = ($filter === null) ? 'today' : $filter;
            if ($filter === 'today') {
                $schedules = Auth::user()->facultyMember->teacherClasses->where('date', now())->sortBy('date');
                return view('AMS.backend.faculty-layouts.dashboard.index', compact('schedules', 'filter'));
            }
            if ($filter === 'week') {
                $schedules = Auth::user()->facultyMember->teacherClasses->whereBetween('date', [now()->subDay(), now()->addDays(8)])->sortBy('date');
                return view('AMS.backend.faculty-layouts.dashboard.index', compact('schedules', 'filter'));
            }
            if ($filter === 'month') {
                $schedules = Auth::user()->facultyMember->teacherClasses->whereBetween('date', [now()->startOfMonth()->subDay(), now()->endOfMonth()->addDay()])->sortBy('date');
                return view('AMS.backend.faculty-layouts.dashboard.index', compact('schedules', 'filter'));
            }
            dd('Invalid filter.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
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
        //
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
