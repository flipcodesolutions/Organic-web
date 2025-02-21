<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Exception;
use App\Models\CityMaster;
use Illuminate\Http\Request;

class CityMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $cities = CityMaster::all();
            return view('admin.city_master.index', compact('cities'));
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: '.$e->getMessage());
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try{
            return view('admin.city_master.create')->with('success', 'City added successfully.');
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
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
            $citymaster->save();
            return redirect()->route('city_master.index')->with('success', 'City added successfully.');
        } 
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }    
    public function edit($id)
    {
        try{
            $city_master = CityMaster::find($id);
            return view('admin.city_master.edit',compact('city_master'))->with('success', 'City added successfully.');
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CityMaster $cityMaster)
    {
        try{
            $citymaster=CityMaster::find($request->city_id);
            $citymaster->city_name_eng = $request->city_name_eng;
            $citymaster->city_name_hin = $request->city_name_hin;
            $citymaster->city_name_guj = $request->city_name_guj;
            $citymaster->pincode = $request->pincode;
            $citymaster->area_eng = $request->area_eng;
            $citymaster->area_hin = $request->area_hin;
            $citymaster->area_guj = $request->area_guj;

            $citymaster->save();
            return redirect()->route('city_master.index')->with('success', 'City updated successfully.');
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function deactive($id)
    {
        try {
            $citymasters = CityMaster::find($id);
            $citymasters->status = 'deactive';
            $citymasters->save(); 
            return redirect()->back()->with('success','successfully deleted');
        } 
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: '.$e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $citymaster = CityMaster::find($id);
            $citymaster->status = 'active';
            $citymaster->save();
            return redirect()->route('city_master.index');
        } 
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: '.$e->getMessage());
        }
    }
    public function deleted()
    {
        try {
            $citymaster = CityMaster::where('status', 'deactive')->paginate(10);
            return view('admin.city_master.deleted', compact('citymaster'));
        } 
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: '.$e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $citymaster = CityMaster::find($id);   
            $citymaster->delete();
            return redirect()->route('city_master.index');
        } 
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: '.$e->getMessage());
        }
    }
} 