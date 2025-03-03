<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NavigateMaster;
use Illuminate\Http\Request;

class NavigateMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $screen = NavigateMaster::where('status', 'active')->paginate(10);
        // return $screen;
        return view('admin.navigate.index', compact('screen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(('admin.navigate.create'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $screen = new NavigateMaster();

        $screen->screenname = $request->screenName;
        $screen->save();

        return redirect()->route('navigate.index')->with('msg', 'New screen created successfully!');
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
    public function edit($id)
    {
        $screen = NavigateMaster::find($id);

        return view('admin.Navigate.edit', compact('screen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $screen = NavigateMaster::find($id);
        $screen->screenname = $request->screenName;
        $screen->save();

        return redirect()->route('navigate.index')->with('msg', 'Screen updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $screen = NavigateMaster::find($id);
        $screen->delete();

        return redirect()->back()->with('msg','Screen deleted successfully! ');
    }

    public function deactive($id)
    {
        $screen = NavigateMaster::find($id);
        $screen->status = 'deactive';
        $screen->save();

        return redirect()->back()->with('msg','Screen Deactivated successfully!');
    }

    public function deactiveindex()
    {
        $screen = NavigateMaster::where('status','deactive')->paginate(10);
        
        return view('admin.navigate.deactive',compact('screen'));
    }

    public function active($id)
    {
        $screen = NavigateMaster::find($id);

        $screen->status = 'active';
        $screen->save();

        return redirect()->route('navigate.index')->with('msg','Screen activated Successfully!');
    }
}
