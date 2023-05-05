<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('AMS.backend.faculty-layouts.academics.subject.index', compact('subjects'));
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
            Subject::create([
                'subject_code' => $request->subject_code,
                'subject_name' => $request->subject_name,
                'subject_description' => $request->subject_description,
                'units' => $request->units,
            ]);
            return redirect()->back()->with('successToast', 'Subject Added Successfully!');
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
        try {
            Subject::where('id', $id)->update([
                'subject_code' => $request->subject_code,
                'subject_name' => $request->subject_name,
                'subject_description' => $request->subject_description,
                'units' => $request->units,
            ]);
            return redirect()->back()->with('successToast', 'Subject Updated Successfully!');
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
            Subject::where('id', $id)->delete();
            return redirect()->back()->with('successToast', 'Subject Deleted Successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }
}
