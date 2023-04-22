<?php

namespace App\Http\Controllers;

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
        return view('AMS.backend.admin-layouts.user.faculty.index', compact('users'));
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
    public function show(FacultyMember $facultyMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FacultyMember $facultyMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FacultyMember $facultyMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FacultyMember $facultyMember)
    {
        //
    }
}
