<?php

namespace App\Http\Controllers;

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
        //
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
        $computer = Computer::findOrFail($id);
        $computer->update(
            $request->all()
        );
        if ($computer->wasChanged()) {
            toast()->success('Success', 'You saved changes')->autoClose(3000)->animation('animate__fadeInRight', 'animate__fadeOutRight')->width('400px');
            return redirect()->back();
        }
        toast()->info('Info', 'There is no changes')->autoClose(3000)->animation('animate__fadeInRight', 'animate__fadeOutRight')->width('400px');
        return redirect()->route('admin.doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        try {
            $computer = Computer::findOrFail($id);
            $computer->delete();
            toast()->warning('Warning!', 'The message has been deleted')->autoClose(3000)->animation('animate__fadeInRight', 'animate__fadeOutRight')->width('400px');
            return back();
        } catch (\Throwable $th) {
            toast()->warning('Warning', $th->getMessage())->autoClose(3000)->animation('animate__fadeInRight', 'animate__fadeOutRight')->width('400px');
            return redirect()->back();
        }
        return back();
    }
}
