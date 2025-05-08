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
    public function index(Request $request)
    {
        $query = UnitMaster::query();

        if ($request->filled('global')) {
            $query->where(function ($q) use ($request) {
                $q->where('unit', '=', $request->global); // Use exact match
            });
        }

        $data = $query->where('status', 'active')->paginate(5);
        $unitmasters = UnitMaster::where('status', 'active')->get();
        return view('admin.unitmaster.index', compact('data', 'unitmasters'));
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
        //  validation
        $request->validate([
            'unit' => [
                'required',
                'max:5',
                'unique:unit_masters,unit',
                'regex:/^[0-9]+[a-zA-Z]+$/',
            ],
        ], [
            //  validation messages
            'unit.required' => 'The unit name is required.',
            'unit.max' => 'The unit name cannot exceed 5 characters.',
            'unit.unique' => 'The unit name already exists in the system.',
            'unit.regex' => 'The unit name must start with a number followed by letters (e.g., 10kg, 5g, 20lb).',
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
        //  validation
        $request->validate([
            'unit' => [
                'required',
                'max:5',
                'unique:unit_masters,unit',
                'regex:/^[0-9]+[a-zA-Z]+$/',
            ],
        ], [
            //  validation messages
            'unit.required' => 'The unit name is required.',
            'unit.max' => 'The unit name cannot exceed 5 characters.',
            'unit.unique' => 'The unit name already exists in the system.',
            'unit.regex' => 'The unit name must start with a number followed by letters (e.g., 10kg, 5g, 20lb).',
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
        $unitmaster->status = 'deactive';
        $unitmaster->save();

        return redirect()->route('unitmaster.index')->with('msg', 'UnitMaster Deactivated Successfully');
    }
    public function deactive(Request $request)
    {
        $query = UnitMaster::query();

        if ($request->filled('global')) {
            $query->where(function ($q) use ($request) {
                $q->where('unit', '=', $request->global);
            });
        }

        $data = $query->where('status', 'deactive')->paginate(10);
        $unitmasters = UnitMaster::where('status', 'deactive')->get();
        return view('admin.unitmaster.deactivedata', compact('data', 'unitmasters'));
    }
    public function active($id)
    {
        $unitmaster = UnitMaster::find($id);
        $unitmaster->status = 'active';
        $unitmaster->save();

        return back()->with('msg', 'UnitMaster Activated Successfully');
    }
    public function permdelete($id)
    {
        $unitmaster = UnitMaster::find($id);
        $unitmaster->delete();

        return back()->with('msg', 'UnitMaster Deleted Successfully');
    }
}
