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
        $cities = CityMaster::all();
        return view('admin.city_master.index', compact('cities'));

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
        // return $request;
        $request->validate([
            'city_name_eng' => 'required|string',
            'city_name_hin' => 'required|string',
            'city_name_guj' => 'required|string',
            'pincode' => 'required|string|max:10',
            'area_eng' => 'required|string',
            'area_hin' => 'required|string',
            'area_guj' => 'required|string',
        ]);

        $citymaster = new CityMaster();
        $citymaster->city_name_eng = $request->city_name_eng;
        $citymaster->city_name_hin = $request->city_name_hin;
        $citymaster->city_name_guj = $request->city_name_guj;
       
        $citymaster->pincode = $request->pincode;

        $citymaster->area_eng = $request->area_eng;
        $citymaster->area_hin = $request->area_hin;
        $citymaster->area_guj = $request->area_guj;

        // return $citymaster;
        
        $citymaster->save();
        return redirect()->route('city_master.index');

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
