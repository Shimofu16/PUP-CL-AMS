<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $computers = Computer::all();
        return view('AMS.backend.admin-layouts.computer.index', compact('computers'));
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
        $request->validate([
            'computer_number' => 'required|unique:computers,computer_number',
            'computer_name' => 'required',
            'os' => 'required',
            'processor' => 'required',
            'memory' => 'required',
            'storage' => 'required',
            'status'=> 'required'
        ]);
        try {
            Computer::create([
                'computer_number' => $request->computer_number,
                'computer_name' => $request->computer_name,
                'os' => $request->os,
                'processor' => $request->processor,
                'memory' => $request->memory,
                'storage' => $request->storage,
                'status' => $request->status,

            ]);
            return back()->with('successToast', 'The computer has been added');
        } catch (\Throwable $th) {
            return back()->with('errorAlert', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Computer $computer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Computer $computer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $computer = Computer::findOrFail($id);
            $computer->update([
                'computer_number' => $request->computer_number,
                'computer_name' => $request->computer_name,
                'os' => $request->os,
                'processor' => $request->processor,
                'memory' => $request->memory,
                'storage' => $request->storage,
                'status' => $request->status,
            ]);
            return back()->with('successToast', 'The computer has been updated');
            // return back()->withToastSuccess('The computer has been updated');
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
            $computer = Computer::findOrFail($id);
            $computer->delete();
            return back()->with('successToast', 'The computer has been deleted');
        } catch (\Throwable $th) {
            return back()->with('errorAlert', $th->getMessage());
        }
        return back();
    }
}
