<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CityMaster;
use App\Models\NavigateMaster;
use App\Models\ProductImage;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Slider::query();

        if($request->filled('global'))
        {

            $query->whereHas('city', function ($q) use ($request) {
                $q->where('city_name_eng', 'like', '%' . $request->global . '%');
            });
        }

        if($request->filled('city_id'))
        {
            $query->where('city_id',$request->city_id);
        }
        if($request->filled('slider_pos'))
        {
            $query->where('slider_pos',$request->slider_pos);

        }


        $data = $query->with('city', 'navigatemaster')->where('status', 'active')->paginate(10);
        $cities = CityMaster::where('status','active')->get();
        // return $cities;
        // return $data;
    return view('admin.slider.index', compact('data','cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = CityMaster::all();
        $navigatemasters = NavigateMaster::all();
        return view('admin.slider.create', compact('cities', 'navigatemasters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required',
            'slider_pos' => 'required',
            // 'image' => 'required|array',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        [
            'city_id.required'=>'The cityName field is required.',
            'slider_pos.required'=>'The slider position field is required.',
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            // store image in public folder (sliderimage folder)
            $imageName = $image->getClientOriginalName();

            $image->move(public_path('sliderimage/'), $imageName);


            $slider = new Slider();
            $slider->city_id = $request->city_id;
            $slider->url = $imageName;
            $slider->slider_pos = $request->slider_pos;
            $slider->is_navigate = $request->has('is_navigate') ? 1 : 0;
            $slider->navigatemaster_id = $request->navigatemaster_id;
            $slider->save();
        }
        return redirect()->route('slider.index')->with('msg', 'Slider Created Successfully');
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
        $slider = Slider::find($id);
        $cities = CityMaster::all();
        $navigatemasters = NavigateMaster::all();
        return view('admin.slider.edit', compact('slider', 'cities', 'navigatemasters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $slider = Slider::find($id);
        $request->validate([
            'city_id' => 'required',
            'slider_pos' => 'required',
            // 'image' => 'required|array',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        [
            'city_id.required'=>'The cityName field is required.',
            'slider_pos.required'=>'The slider position field is required.',
        ]);

        if ($request->hasFile('image')) {

            // Delete the old image from storage, if it exists
            if ($slider->url && file_exists(public_path('sliderimage/' . $slider->url))) {
                unlink(public_path('sliderimage/' . $slider->url));
            }


            $image = $request->file('image');
            // store image in public folder (sliderimage folder)
            $imageName = $image->getClientOriginalName();

            $image->move(public_path('sliderimage/'), $imageName);

            $slider->url = $imageName;
        }
            // store data in database
            $slider->city_id = $request->city_id;
            $slider->slider_pos = $request->slider_pos;
            $slider->is_navigate = $request->has('is_navigate') ? 1 : 0;
            $slider->navigatemaster_id = $request->navigatemaster_id;
            $slider->save();

        return redirect()->route('slider.index')->with('msg', 'Slider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $slider = Slider::find($id);
        $slider->status = 'deactive';
        $slider->save();

        return redirect()->route('slider.index')->with('msg', 'Slider Deactivated Successfully');
    }
    public function deactive(Request $request)
    {

        $query = Slider::query();

        if($request->filled('global'))
        {
            $query->whereHas('city',function ($q) use ($request){
                $q->where('city_name_eng','like','%'.$request->global.'%');
            });
        }

        if($request->filled('city_id'))
        {
            $query->where('city_id',$request->city_id);
        }

        if($request->filled('slider_pos'))
        {
            $query->where('slider_pos',$request->slider_pos);
        }

        $data = $query->with('city')->where('status', 'deactive')->paginate(10);
        // return $data;
        $cities = CityMaster::where('status','deactive')->get();
        // $sliders = Slider::where('status', 'deactive')->get();

        return view('admin.slider.deactivedata', compact('data','cities'));
    }
    public function active($id)
    {
        $slider = Slider::find($id);
        $slider->status = 'active';
        $slider->save();

        return redirect()->route('slider.index')->with('msg', 'Slider Activated Successfully');
    }
    public function permdelete($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        unlink(public_path('sliderimage/'.$slider->url));

        return redirect()->route('slider.index')->with('msg', 'Slider Deleted Successfully');
    }
}
