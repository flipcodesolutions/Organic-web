<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PointPer;
use Illuminate\Http\Request;

class PointPerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $per = PointPer::get();
        return view('admin.pointper.index', compact('per'));
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
        $per = PointPer::find($id);
        return view('admin.pointper.edit', compact('per'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pointpercentage' => 'required|numeric'
        ]);
        $per = Pointper::find($id);
        $per->per = $request->pointpercentage;
        $per->save();

        return redirect()->route('pointper.index')->with('msg', 'Percentage updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
