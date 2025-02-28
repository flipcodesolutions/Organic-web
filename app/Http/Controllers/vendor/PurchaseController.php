<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Product;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function purchaseReport()
    {
        
        $purchase=Purchase::with("productData")->get();
       // $purchase=Product::get();
        //return $purchase;
         return view('admin.reports.purchaseReport',['purchase'=>$purchase]);

        // try{
        // $cities = CityMaster::all();
        // return view('admin.city_master.index', compact('cities'));
        // }
        // catch (\Exception $e) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => $e
        //     ], 500);
        // }
        // $a="hello";
      
    }
}
