<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query= Product::query();

        if ($request->filled('global')) {
            $query->where(function ($q) use ($request) {
                $q->where('productName', 'like', '%' . $request->global . '%');
            })->get();
            // return $query;
        }

        // if ($request->filled('productId')) {
            $data = Unit::where('product_id',$request->productId)->with('unitMaster')->get();
        // }

        $product = Product::where('status','active')->orderBy('productName', 'asc')->get();
        return view('admin.unit.index',compact('product','data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $unit = Unit::with('unitmaster')->find($id);
        return view('admin.unit.edit',compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request;
        $request->validate([
            'price' => 'required|numeric',
            'unitDetails' => 'required',
            'desPer' => 'required|numeric|between:1,100',
            'sellingPrice' => 'required|numeric'
        ]);
        $unit = Unit::find($id);
        $unit->price = $request->price;
        $unit->detail = $request->unitDetails;
        $unit->per = $request->desPer;
        $unit->sell_price = $request->sellingPrice;
        $unit->save();

        return redirect()->route('unit.index')->with('msg','Unit Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unit = Unit::find($id);
        $unit->delete();

        return redirect()->route('unit.index')->with('msg','Unit Deleted Successfully!');
    }
}
