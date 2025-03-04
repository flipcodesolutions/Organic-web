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
    public function purchaseDateWIse(){
        return view('admin.reports.purchaseDateWise');
    }
    public function purchaseDateWiseReport(Request $request){
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        $request->session()->put('start_date',$request->start_date);
        $request->session()->put('end_date',$request->end_date);
     //   $data=Purchase::with("productData")->whereBetween('date',[$request->start_date, $request->end_date])->get();
       // return $data;
       $data=Purchase::with("productData")->whereDate('date', '>=', $request->start_date)
                ->whereDate('date', '<=', $request->end_date)
                ->get();
           return view('admin.reports.purchaseDateWiseReport',['data'=>$data]);
    }
    public function purchaseReport()
    {
         $purchase=Purchase::with("productData")->get();
         return view('admin.reports.purchaseReport',['purchase'=>$purchase]);  
    }
}
