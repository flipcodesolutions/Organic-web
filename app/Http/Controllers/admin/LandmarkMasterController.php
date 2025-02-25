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
        try{
            $landmarkmasters = LandmarkMaster::with('citymaster')->get();
            return view('admin.landmark_master.index', compact('landmarkmasters'));
        }
        catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        try{
            $cities = CityMaster::all();
            return View('admin.landmark_master.create',compact('cities'));
        }
        catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e
            ], 500);
        }
    }

    /**
     * 
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                // 'city_id' => 'required|exists:city_master,id',
                'landmark_eng' => 'required|string',
                'landmark_hin' => 'required|string',
                'landmark_guj' => 'required|string',
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
            ]);

            $landmarkmasters = new LandmarkMaster();
            $landmarkmasters->city_id = $request->city_name_eng;
            // $landmarkmasters->city_id = $request->city_name_hin;
            // $landmarkmasters->city_id = $request->city_name_guj;

            $landmarkmasters->landmark_eng = $request->landmark_eng;
            $landmarkmasters->landmark_hin = $request->landmark_hin;
            $landmarkmasters->landmark_guj = $request->landmark_guj;
            $landmarkmasters->latitude = $request->latitude;
            $landmarkmasters->longitude = $request->longitude;

            // return $landmarkmaster;
            // return $request;
            $landmarkmasters->save();
            return redirect()->route('landmark.index');
        }
        catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e
            ], 500);
        }
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
    public function edit($id)
    {
        try{
            $cities = CityMaster::all();

            $landmarkmaster = LandmarkMaster::find($id);
            return view('admin.landmark_master.edit',compact('landmarkmaster','cities'));
        }
        catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LandmarkMaster $landmarkMaster)
    {
        try{

            $landmarkmasters =LandmarkMaster::find($request->landmark_id);

            $landmarkmasters->city_id = $request->city_name_eng;
            $landmarkmasters->city_id = $request->city_name_hin;
            $landmarkmasters->city_id = $request->city_name_guj;

            $landmarkmasters->landmark_eng = $request->landmark_eng;
            $landmarkmasters->landmark_hin = $request->landmark_hin;
            $landmarkmasters->landmark_guj = $request->landmark_guj;
            $landmarkmasters->latitude = $request->latitude;
            $landmarkmasters->longitude = $request->longitude;

            $landmarkmasters->save();
            return redirect()->route('landmark.index');
        }
        catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LandmarkMaster $landmarkMaster)
    {
        //
    }
}
