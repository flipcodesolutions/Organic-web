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
    public function index()
    {
        $sliders = Slider::with('city','navigatemaster')->where('status','active')->get();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = CityMaster::all();
        $navigatemasters =NavigateMaster::all();
        return view('admin.slider.create', compact('cities','navigatemasters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required',
            'slider_pos' => 'required',
        ]);
        $slider = new Slider();
        $slider->city_id = $request->city_id;
        $slider->slider_pos = $request->slider_pos;
        $slider->is_navigate = $request->has('is_navigate') ? 1 : 0;
        $slider->navigatemaster_id = $request->navigatemaster_id;
        $slider->save();

        return redirect()->route('slider.index')->with('msg', 'Data Is Inserted successfully');
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
        return view('admin.slider.edit', compact('slider', 'cities','navigatemasters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'city_id' => 'required',
            'slider_pos' => 'required',
        ]);

        $slider = Slider::find($id);
        $slider->city_id = $request->city_id;
        $slider->slider_pos = $request->slider_pos;
        $slider->is_navigate = $request->has('is_navigate') ? 1 : 0;
        $slider->navigatemaster_id = $request->navigatemaster_id;
        $slider->save();

        return redirect()->route('slider.index')->with('msg','Data Is Updated Successfuly');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $slider = Slider::find($id);
        $slider->status='deactive';
        $slider->save();

        return redirect()->back();
    }
    public function deactive()
    {
        $sliders = Slider::where('status','deactive')->get();
        return view('admin.slider.deactivedata',compact('sliders'));
    }
    public function active($id)
    {
       $slider = Slider::find($id);
       $slider->status ='active';
       $slider->save();

       return redirect()->back()->with('msg','Status Is Active Successfuly');

    }
    public function permdelete($id)
    {
        $slider =Slider::find($id);
        $slider->delete();

        return redirect()->back();
    }
}
