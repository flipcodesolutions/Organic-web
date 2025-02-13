<?php

namespace App\Http\Controllers;

use App\Models\LandmarkMaster;
use App\Models\CityMaster;
use Illuminate\Http\Request;

class LandmarkMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('landmark_master.index', ['landmarks' => LandmarkMaster::with('city')->get()]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('landmark_master.create', ['cities' => CityMaster::all()]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required|exists:city_master,id',
            'landmark_en' => 'required|string',
            'landmark_hi' => 'required|string',
            'landmark_gu' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        LandmarkMaster::create($request->all());

        return redirect()->route('landmark_master.index')->with('success', 'Landmark added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(LandmarkMaster $landmarkMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LandmarkMaster $landmarkMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LandmarkMaster $landmarkMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LandmarkMaster $landmarkMaster)
    {
        //
    }
}
