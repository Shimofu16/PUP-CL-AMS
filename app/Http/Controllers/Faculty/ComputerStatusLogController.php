<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use App\Models\ComputerStatusLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComputerStatusLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $computers = Computer::all();
        return view('AMS.backend.faculty-layouts.computer.index', compact('computers'));
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
        try {
            ComputerStatusLog::create([
                'user_id' => Auth::id(),
                'computer_id' => $id,
                'description' => $request->description,
                'status' => $request->status,
            ]);
            return back()->with('successToast', 'Computer report added successfully!');
        } catch (\Throwable $th) {
            return back()->with('errorAlert', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
