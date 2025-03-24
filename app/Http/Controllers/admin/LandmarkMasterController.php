<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\LandmarkMaster;
use App\Models\CityMaster;
use Exception;
use Illuminate\Http\Request;

class LandmarkMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // $query = LandmarkMaster::with('citymaster')->where('status', 'active');

            $query = LandmarkMaster::query();

            // Global Search (landmark_eng or city_id)
            if ($request->filled('global')) {
                $query->where(function ($q) use ($request) {
                    $q->where('landmark_eng', 'like', '%' . $request->global . '%')
                        ->orWhere('city_id', 'like', '%' . $request->global . '%');
                });
            }
            
            // Filter by Specific Landmark
            if ($request->filled('cityId')) {
                $query->where('city_id', $request->cityId);
            }

            $data = $query->where('status', 'active')->with('citymaster')->paginate(10);
            $cities = CityMaster::where('status', 'active')->orderBy('city_name_eng', 'asc')->get();
            // $landmarkmasters = LandmarkMaster::where('status', 'active')->select('id', 'landmark_eng')->get();
            return view('admin.landmark_master.index', compact('data', 'cities'));
        } 
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        try {
            $cities = CityMaster::all();
            return View('admin.landmark_master.create', compact('cities'));
        } 
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
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
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180'
        ]);
        try {
            $landmarkmasters = new LandmarkMaster();
            $landmarkmasters->city_id = $request->city_id;
            $landmarkmasters->landmark_eng = $request->landmark_eng;
            $landmarkmasters->landmark_hin = $request->landmark_hin;
            $landmarkmasters->landmark_guj = $request->landmark_guj;
            $landmarkmasters->latitude = $request->latitude;
            $landmarkmasters->longitude = $request->longitude;

            $landmarkmasters->save();
            return redirect()->route('landmark.index')->with('success', 'stored');
        } 
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $cities = CityMaster::all();

            $landmarkmaster = LandmarkMaster::find($id);
            return view('admin.landmark_master.edit', compact('landmarkmaster', 'cities'));
        } 
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LandmarkMaster $landmarkMasters)
    {
        // return $request;
        $request->validate([
            'city_id' => 'required|exists:city_masters,id',
            'landmark_eng' => 'required|string',
            'landmark_hin' => 'required|string',
            'landmark_guj' => 'required|string',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180'
        ]);
        try {
            $landmarkmasters = LandmarkMaster::find($request->landmark_id);
            $landmarkmasters->city_id = $request->city_id;
            // $landmarkmasters->city_id = $request->city_name_hin;
            // $landmarkmasters->city_id = $request->city_name_guj;
            $landmarkmasters->landmark_eng = $request->landmark_eng;
            $landmarkmasters->landmark_hin = $request->landmark_hin;
            $landmarkmasters->landmark_guj = $request->landmark_guj;
            $landmarkmasters->latitude = $request->latitude;
            $landmarkmasters->longitude = $request->longitude;

            $landmarkmasters->save();
            return redirect()->route('landmark.index')->with('msg', 'Landmark updated successfully!');
        } 
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function deactive($id)
    {
        try {
            $landmarkmasters = LandmarkMaster::find($id);
            $landmarkmasters->status = 'deactive';
            $landmarkmasters->save();
            return redirect()->back()->with('msg', 'Landmark deactivated successfully!');
        } 
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $landmarkmasters = LandmarkMaster::find($id);
            $landmarkmasters->status = 'active';
            $landmarkmasters->save();
            return back()->with('msg', 'Landmark Activated Successfully');
        } 
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function deleted(Request $request)
    {
        try {

            $query = LandmarkMaster::query();

            // Global Search (landmark_eng or city_id)
            if ($request->filled('global')) {
                $query->where(function ($q) use ($request) {
                    $q->where('landmark_eng', 'like', '%' . $request->global . '%')
                        ->orWhere('city_id', 'like', '%' . $request->global . '%');
                });
            }
            // Filter by Specific Landmark
            if ($request->filled('cityId')) {
                $query->where('city_id', $request->cityId);
            }

            $data = $query->where('status', 'deactive')->with('citymaster')->paginate(10);
            $cities = CityMaster::where('status', 'active')->orderBy('city_name_eng', 'asc')->get();

            // $landmarkmasters = LandmarkMaster::where('status', 'deactive')->paginate(10);
            return view('admin.landmark_master.deleted', compact('data','cities'))->with('msg', 'Landmark Deleted Successfully');

        } 
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $landmarkmasters = LandmarkMaster::find($id);
            $landmarkmasters->delete();
            return back()->with('msg', 'Deleted Permanently');
        } 
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
