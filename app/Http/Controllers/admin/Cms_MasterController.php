<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cms_Master;
use Illuminate\Http\Request;

class Cms_MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cms_masters = Cms_Master::where('status', 'active')->get();
        return view('admin.cms_master.index', compact('cms_masters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cms_master.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'titleguj' => 'required',
            'titlehin' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'descriptionguj' => 'required',
            'descriptionhin' => 'required',
        ]);
        $cms_master = new Cms_Master();
        $cms_master->title=$request->title;
        $cms_master->titleGuj=$request->titleguj;
        $cms_master->titleHin=$request->titlehin;
        $cms_master->slug=$request->slug;
        $cms_master->description=$request->description;
        $cms_master->descriptionGuj=$request->descriptionguj;
        $cms_master->descriptionHin=$request->descriptionhin;
        $cms_master->save();

        return redirect()->route('cms_master.index')->with('msg', 'CmsMaster Created Successfully');
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
        $cms_masters = Cms_Master::find($id);
        return view('admin.cms_master.edit', compact('cms_masters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'titleguj' => 'required',
            'titlehin' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'descriptionguj' => 'required',
            'descriptionhin' => 'required',
        ]);
        $cms_master = Cms_Master::find($id);
        $cms_master->title=$request->title;
        $cms_master->titleGuj=$request->titleguj;
        $cms_master->titleHin=$request->titlehin;
        $cms_master->slug=$request->slug;
        $cms_master->description=$request->description;
        $cms_master->descriptionGuj=$request->descriptionguj;
        $cms_master->descriptionHin=$request->descriptionhin;
        $cms_master->save();

        return redirect()->route('cms_master.index')->with('msg', 'CmsMaster Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $cms_master = Cms_Master::find($id);
        $cms_master->status = 'deactive';
        $cms_master->save();
        return redirect()->route('cms_master.index')->with('msg', 'CmsMaster Deactivated Successfully');
    }
    public function deactive()
    {
        $cms_masters = Cms_Master::where('status', 'deactive')->get();
        return view('admin.cms_master.deactivedata', compact('cms_masters'));
    }
    public function active($id)
    {
        $cms_master = Cms_Master::find($id);
        $cms_master->status = 'active';
        $cms_master->save();

        return redirect()->route('cms_master.index')->with('msg', 'CmsMaster Activated Successfully');
    }
    public function permdelete(string $id)
    {
        $cms_master = Cms_Master::find($id);
        $cms_master->delete();
        return redirect()->route('cms_master.index')->with('msg', 'CmsMaster Deleted Successfully');
    }

}
