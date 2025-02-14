<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\CityMaster;
use Illuminate\Http\Request;

class CityMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $city = CityMaster::all();
        return view('admin.city_master.index', compact('city'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.city_master.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'city_name_en' => 'required|string',
            'city_name_hi' => 'required|string',
            'city_name_gu' => 'required|string',
            'pincode' => 'required|string|max:10',
            'area_en' => 'required|string',
            'area_hi' => 'required|string',
            'area_gu' => 'required|string',
        ]);

        CityMaster::create($request->all());

        return redirect()->route('admin.city_master.index')->with('success', 'City added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(CityMaster $cityMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CityMaster $cityMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CityMaster $cityMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CityMaster $cityMaster)
    {
        //
    }
}
