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
    public function index(Request $request)
    {
        $query = NavigateMaster::query();

        if ($request->filled('global')) {
            $query->where(function ($q) use ($request) {
                $q->where('screenname', 'like', '%' . $request->global . '%');
                // ->orWhere('categoryId', 'like', '%' . $request->global . '%');
            });
        }
        $data = $query->where('status', 'active')->paginate(10);
        // return $screen;
        return view('admin.navigate.index', compact('data'));
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
        $request->validate([
            'screenName' => 'required'
        ]);
        try {
            // return $request;
            $screen = new NavigateMaster();

            $screen->screenname = $request->screenName;
            $screen->save();

            return redirect()->route('navigate.index')->with('msg', 'New screen created successfully!');
        } catch (\Exception $e) {
            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        }
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
        $request->validate([
            'screenName' => 'required'
        ]);
        try{
        $screen = NavigateMaster::find($id);
        $screen->screenname = $request->screenName;
        $screen->save();

        return redirect()->route('navigate.index')->with('msg', 'Screen updated successfully!');
        }catch (\Exception $e) {
            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $screen = NavigateMaster::find($id);
        $screen->delete();

        return redirect()->back()->with('msg', 'Screen deleted successfully! ');
    }

    public function deactive($id)
    {
        $screen = NavigateMaster::find($id);
        $screen->status = 'deactive';
        $screen->save();

        return redirect()->back()->with('msg', 'Screen Deactivated successfully!');
    }

    public function deactiveindex(Request $request)
    {
        $query = NavigateMaster::query();

        if ($request->filled('global')) {
            $query->where(function ($q) use ($request) {
                $q->where('screenname', 'like', '%' . $request->global . '%');
                // ->orWhere('categoryId', 'like', '%' . $request->global . '%');
            });
        }
        $data = $query->where('status', 'deactive')->paginate(10);

        return view('admin.navigate.deactive', compact('data'));
    }

    public function active($id)
    {
        $screen = NavigateMaster::find($id);

        $screen->status = 'active';
        $screen->save();

        return redirect()->route('navigate.index')->with('msg', 'Screen activated Successfully!');
    }
}
