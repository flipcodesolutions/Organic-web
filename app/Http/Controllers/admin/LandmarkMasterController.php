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
    public function index(Request $request)
    {

        $query = LandmarkMaster::query();

        if ($request->filled('global')) {
            $query->where(function ($q) use ($request) {
                $q->where('landmark_eng', 'like', '%' . $request->global . '%')
                ->orWhere('city_id', 'like', '%' . $request->global . '%');
            });
        }

        if ($request->filled('landmarkId')) {
            $query->where('id', $request->landmarkId);
        }

        $data = $query->where('status','active')->paginate(10);
        $landmarkmasters = CityMaster::where('status', 'active')->get();


        return view('admin.landmark_master.index', compact('data','landmarkmasters'));

        // $landmarkmasters = LandmarkMaster::with('CityMaster')->get();
        // return view('admin.landmark_master.index', compact('landmarkmasters'));
    }
    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
            $cities = CityMaster::all();
            return View('admin.landmark_master.create',compact('cities'));
    }
    /**
     *
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
                'city_id' => 'required|exists:city_masters,id',
                'landmark_eng' => 'required|string',
                'landmark_hin' => 'required|string',
                'landmark_guj' => 'required|string',
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
            ]);

            $landmarkmasters = new LandmarkMaster();

            $landmarkmasters->city_id = $request->city_id;

            $landmarkmasters->landmark_eng = $request->landmark_eng;
            $landmarkmasters->landmark_hin = $request->landmark_hin;
            $landmarkmasters->landmark_guj = $request->landmark_guj;
            $landmarkmasters->latitude = $request->latitude;
            $landmarkmasters->longitude = $request->longitude;

            $landmarkmasters->save();
            return redirect()->route('landmark.index')->with('success','stored');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
            $cities = CityMaster::all();

            $landmarkmaster = LandmarkMaster::find($id);
            return view('admin.landmark_master.edit',compact('landmarkmaster','cities'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LandmarkMaster $landmarkMasters)
    {
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

    public function deactive($id)
    {
        try {
            $landmarkmasters = LandmarkMaster::find($id);
            $landmarkmasters->status = 'deactive';
            $landmarkmasters->save();
            return redirect()->back()->with('success','successfully deleted');
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: '.$e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $landmarkmasters = LandmarkMaster::find($id);
            $landmarkmasters->status = 'active';
            $landmarkmasters->save();
            return redirect()->route('landmark.index');
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: '.$e->getMessage());
        }
    }
    public function deleted()
    {
        try {
            $landmarkmasters = LandmarkMaster::where('status', 'deactive')->paginate(10);
            return view('admin.landmark_master.deleted', compact('landmarkmasters'));
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: '.$e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $landmarkmasters = LandmarkMaster::find($id);
            $landmarkmasters->delete();
            return redirect()->route('landmark.index');
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: '.$e->getMessage());
        }
    }







}
