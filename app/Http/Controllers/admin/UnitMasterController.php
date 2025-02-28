<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\UnitMaster;
use Illuminate\Http\Request;

class UnitMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unitmasters = UnitMaster::where('status', 'active')->get();
        return view('admin.unitmaster.index', compact('unitmasters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.unitmaster.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'unit' => 'required',
        ]);

        $unitmaster = new UnitMaster();
        $unitmaster->unit = $request->unit;
        $unitmaster->save();

        return redirect()->route('unitmaster.index')->with('msg', 'UnitMaster Created Successfully');
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
        $unitmasters = UnitMaster::find($id);
        return view('admin.unitmaster.edit', compact('unitmasters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'unit' => 'required',
        ]);

        $unitmaster = UnitMaster::find($id);
        $unitmaster->unit = $request->unit;
        $unitmaster->save();

        return redirect()->route('unitmaster.index')->with('msg', 'UnitMaster Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $unitmaster = UnitMaster::find($id);
        $unitmaster->status ='deactive';
        $unitmaster->save();

        return redirect()->route('unitmaster.index')->with('msg', 'UnitMaster Deactivated Successfully');
    }
    public function deactive()
    {
        $unitmasters = UnitMaster::where('status', 'deactive')->get();
        return view('admin.unitmaster.deactivedata', compact('unitmasters'));
    }
    public function active($id)
    {
        $unitmaster = UnitMaster::find($id);
        $unitmaster->status = 'active';
        $unitmaster->save();

        return redirect()->route('unitmaster.index')->with('msg', 'UnitMaster Activated Successfully');
    }
    public function permdelete($id)
    {
        $unitmaster = UnitMaster::find($id);
        $unitmaster->delete();

        return redirect()->route('unitmaster.index')->with('msg', 'UnitMaster Deleted Successfully');
    }

}
