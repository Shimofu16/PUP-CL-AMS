<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* sort sections by course code */
        $sections = Section::with('course')->get()->sortBy(function ($section) {
            return $section->course->course_code;
        });
        $courses = Course::all();
        return view('AMS.backend.faculty-layouts.academics.section.index', compact('sections', 'courses'));
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
            Section::create([
                'section_name' => $request->section_name,
                'course_id' => $request->course_id,
            ]);
            return redirect()->back()->with('successToast', 'Section created successfully');
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
            Section::where('id', $id)->update([
                'section_name' => $request->section_name,
                'course_id' => $request->course_id,
            ]);
            return redirect()->back()->with('successToast', 'Section updated successfully');
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
            Section::where('id', $id)->delete();
            return redirect()->back()->with('successToast', 'Section deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }
}
