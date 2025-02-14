<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
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
        $landmark = LandmarkMaster::all();
        return view('admin.landmark_master.index', compact('landmark'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = CityMaster::all();
        return View('admin.landmark.create',compact('cities'));
     

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required|exists:city_master,id',
            'landmark_eng' => 'required|string',
            'landmark_hin' => 'required|string',
            'landmark_guj' => 'required|string',
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
