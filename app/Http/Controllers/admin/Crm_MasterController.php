<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crm_Master;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class Crm_MasterController extends Controller
{
    public function index()
    {
        $crmMasters = Crm_Master::all();
        return view('admin.crm_master.index', compact('crmMasters'));
    }

    public function create()
    {
        return view('admin.crm_master.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'required|in:Active,Inactive',
        ]);

        Crm_Master::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('crm-masters.index')->with('success', 'CRM Master created successfully.');
    }

    public function show($id)
    {
        $crmMaster = Crm_Master::findOrFail($id);
        return view('admin.crm_master.show', compact('crmMaster'));
    }

    public function edit($id)
    {
        $crmMaster = Crm_Master::findOrFail($id);
        return view('admin.crm_master.edit', compact('crmMaster'));
    }

//     public function update(Request $request, $id)
// {
//     // Find the model by its ID


//     // Validate incoming data
//     $request->validate([
//         'title' => 'required',
//         'description' => 'nullable',
//         'status' => 'required|in:Active,Inactive',
//     ]);

//     // Update the CRM Master record
//     $crmMaster = Crm_Master::find($id);
//     // $crmMaster->update([
//     //     'title' => $request->title,
//     //     'slug' => Str::slug($request->title),
//     //     'description' => $request->description,
//     //     'status' => $request->status,
//     // ]);
//     Crm_Master::update([
//         'title' => $request->title,
//         'slug' => Str::slug($request->title),
//         'description' => $request->description,
//         'status' => $request->status,
//     ]);

//     // Redirect to the index page with success message
//     return redirect()->route('crm-masters.index')->with('success', 'CRM Master updated successfully.');
// }
public function update(Request $request, $id)
{
    // Find the model by its ID
    $crmMaster = Crm_Master::findOrFail($id); // It's better to use findOrFail() to handle errors if the model isn't found

    // Validate incoming data
    $request->validate([
        'title' => 'required',
        'description' => 'nullable',
        'status' => 'required|in:Active,Inactive',
    ]);

    // Update the CRM Master record
    $crmMaster->update([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'description' => $request->description,
        'status' => $request->status,
    ]);

    // Redirect to the index page with success message
    return redirect()->route('crm-masters.index')->with('success', 'CRM Master updated successfully.');
}


    // public function update(Request $request, $id)
    // {
    //     $crmMaster = Crm_Master::findOrFail($id);

    //     $request->validate([
    //         'title' => 'required',
    //         'description' => 'nullable',
    //         'status' => 'required|in:Active,Inactive',
    //     ]);

    //     $crmMaster->update([
    //         // 'id' => $request->id,
    //         'title' => $request->title,
    //         'slug' => Str::slug($request->title),
    //         'description' => $request->description,
    //         'status' => $request->status,
    //     ]);

    //     return redirect()->route('crm-masters.index')->with('success', 'CRM Master updated successfully.');
    // }

    public function destroy(Crm_Master $crmMaster)
    {
        $crmMaster->delete();
        return redirect()->route('crm-masters.index')->with('success', 'CRM Master deleted successfully.');
    }
}
