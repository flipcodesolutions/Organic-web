<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderMaster;
use App\Models\OrderDetail;

class OrderMasterController extends Controller
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
    public function orderReport(Request $request)
    {
        // return "hello";
    
        $data = [];
        // $request->validate([
        //     'start_date' => 'required|date|before:end_date',
        //     'end_date' => 'required|date|after_or_equal:start_date',
        // ]);
      
       
   if($request->start_date ){
          $request->session()->put('order_start_date',$request->start_date);
        $request->session()->put('order_end_date',$request->end_date);
    $data = OrderMaster::with(['user', 'orderDetails.product', 'shippingAddress'])
                        ->whereDate('orderDate', '>=', $request->start_date)
                        ->whereDate('orderDate', '<=', $request->end_date)
                        ->get();
          
    //   return $data;
     }
     return view('admin.reports.orderReport',['data'=>$data]);
    }

    public function billgeneration(Request $request,$id){
        $data = OrderMaster::find($id);
        $request->session()->put('orderid',$id);
        //  return $data;
        return view('admin.reports.bill',['data'=>$data]);
    }
}
