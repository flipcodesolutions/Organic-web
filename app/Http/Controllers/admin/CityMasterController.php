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
    public function index(Request $request)
    {
        try{
            $query = CityMaster::query();

            if ($request->filled('global'))
            {
                $query->where(function ($q) use ($request) {
                    $q->where('city_name_eng', 'like', '%' . $request->global . '%')
                    ->orWhere('pincode', 'like', '%' . $request->global . '%');
                });
            }
            // if ($request->filled('cityId'))
            // {
            //     $query->where('id', $request->cityId);
            // }
            $data = $query->where('status','active')->paginate(10);
            // $cities = CityMaster::where('status', 'active')->get();
            return view('admin.city_master.index', compact('data'));
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
                $request->validate([
                'city_name_eng' => 'required',
                'city_name_guj' => 'required',
                'city_name_hin' => 'required',
                'pincode' => 'required|string|max:10',
                'area_eng' => 'required',
                'area_guj' => 'required',
                'area_hin' => 'required',
            ],[
                'city_name_eng.required' => 'The city name english field is required.',
                'city_name_guj.required' => 'The city name gujarati field is required.',
                'city_name_hin.required' => 'The city name hindi field is required.',
                'area_eng.required' => 'The area english field is required.',
                'area_guj.required' => 'The area gujarati field is required.',
                'area_hin.required' => 'The area hindi field is required.',
            ]);
            try{

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
            $citymaster = CityMaster::find($id);
            return view('admin.city_master.edit',compact('citymaster'))->with('success', 'City added successfully.');
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: '.$e->getMessage());
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CityMaster $cityMaster)
    {
        $request->validate([
            'city_name_eng' => 'required',
            'city_name_guj' => 'required',
            'city_name_hin' => 'required',
            'pincode' => 'required|string|max:10',
            'area_eng' => 'required',
            'area_guj' => 'required',
            'area_hin' => 'required',
        ],[
            'city_name_eng.required' => 'The city name english field is required.',
            'city_name_guj.required' => 'The city name gujarati field is required.',
            'city_name_hin.required' => 'The city name hindi field is required.',
            'area_eng.required' => 'The area english field is required.',
            'area_guj.required' => 'The area gujarati field is required.',
            'area_hin.required' => 'The area hindi field is required.',
        ]);
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
            return redirect()->back()->with('error', 'An error occurred: '.$e->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function deactive($id)
    {
        try {
            $citymaster = CityMaster::find($id);
            $citymaster->status = 'deactive';
            $citymaster->save();
            return redirect()->back()->with('msg', 'City deactivated successfully!');
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
            return redirect()->back()->with('msg','City Activated Successfully');
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: '.$e->getMessage());
        }
    }
    public function deleted(Request $request)
    {
        try {

            $query = CityMaster::query();

            if ($request->filled('global'))
            {
                $query->where(function ($q) use ($request) {
                    $q->where('city_name_eng', 'like', '%' . $request->global . '%')
                    ->orWhere('pincode', 'like', '%' . $request->global . '%');
                });
            }
            // if ($request->filled('cityId'))
            // {
            //     $query->where('id', $request->cityId);
            // }
            $data = $query->where('status','deactive')->paginate(10);

            // $citymaster = CityMaster::where('status', 'deactive')->paginate(10);
            return view('admin.city_master.deactive', compact('data'));
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
            return redirect()->back()->with('msg','City deleted successfully!');
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: '.$e->getMessage());
        }
    }
}
