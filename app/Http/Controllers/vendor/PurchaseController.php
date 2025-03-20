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
        $purchases = Purchase::where('status', '!=', 'deleted')->get();
        return view('vendor.purchases.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vendor.purchases.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'date' => 'required|date',
            'price' => 'required|integer',
            'qty' => 'required|integer',
        ]);

        Purchase::create($request->all());
        return redirect()->route('purchases.index')->with('msg', 'Purchase added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $purchase = Purchase::findOrFail($id);
        return view('vendor.purchases.edit', compact('purchase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'date' => 'required|date',
            'price' => 'required|integer',
            'qty' => 'required|integer',
        ]);

        $purchase = Purchase::findOrFail($id);
        $purchase->update($request->all());
        return redirect()->route('purchases.index')->with('msg', 'Purchase updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->update(['status' => 'deleted']);
        return redirect()->route('purchases.index')->with('msg', 'Purchase deleted successfully.');
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
        //  $purchase=Purchase::with("productData")->get();
        //  return view('admin.reports.purchaseReport',['purchase'=>$purchase]); 
         return view('admin.reports.purchaseDateWise'); 
    }
}
