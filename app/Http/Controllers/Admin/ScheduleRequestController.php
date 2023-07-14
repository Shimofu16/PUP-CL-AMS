<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScheduleRequest;
use Illuminate\Http\Request;

class ScheduleRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = ScheduleRequest::with('scheduleDate')->where('status', 'pending')->get();
        return view('AMS.backend.admin-layouts.reports.schedule.index', compact('requests'));
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
    public function update(string $id, string $status)
    {
        try {
            $schedule = ScheduleRequest::find($id);
            $schedule->status = $status;
            $schedule->save();
            if ($status == 'approved') {
                $schedule->teacherClass->update([
                    'date' => $schedule->date,
                    'start_time' => $schedule->start_time,
                    'end_time' => $schedule->end_time,
                ]);
            }
            return redirect()->back()->with('successToast', 'Request ' . $status . ' successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, string $status)
    {
    }
}
