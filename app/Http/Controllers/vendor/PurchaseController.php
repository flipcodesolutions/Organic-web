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
        $purchases = Purchase::with('product')->get();
        return view('admin.reports.purchaseindex', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $products = Product::all();
        return view('admin.reports.purchasecreate', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Purchase $purchase)
    {
        //
         $request->validate([
        'product_id' => 'required|integer',
        'date' => 'required|date',
        'price' => 'required|integer',
        'qty' => 'required|integer',
        'status' => 'required|in:active,deactive,deleted',
    ]);

    $purchase = Purchase::create($request->all());

    $product = Product::find($request->user_id);
    if ($product) {
        $product->stock += $request->qty;
        $product->product = $request->price;
        $product->save();
    }

    return redirect()->route('purchase.index')->with('success', 'Purchase created and stock updated.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        //
         return view('admin.reports.purchaseshow', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $purchase = Purchase::findOrFail($id);
    $products = Product::all();
         return view('admin.reports.purchaseedit', compact('purchase','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
        $request->validate([
        'product_id' => 'required|integer',
        'date' => 'required|date',
        'price' => 'required|integer',
        'qty' => 'required|integer',
        'status' => 'required|in:active,deactive,deleted',
    ]);

    $oldQty = $purchase->qty;
    $oldProductId = $purchase->product_id;


    $purchase->update($request->all());


    if ($oldProductId != $request->product_id) {

        $oldProduct = Product::find($oldProductId);
        if ($oldProduct) {
            $oldProduct->stock -= $oldQty;
            $oldProduct->save();
        }


        $newProduct = Product::find($request->product_id);
        if ($newProduct) {
            $newProduct->stock += $request->qty;
            $newProduct->price = $request->price;
            $newProduct->save();
        }
    } else {

        $product = Product::find($request->product_id);
         if ($product) {
            $product->stock += ($request->qty - $oldQty);

            $product->save();
        }
    }

    return redirect()->route('purchase.index')->with('success', 'Purchase updated and stock adjusted.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        //
        $product = Product::find($purchase->product_id);
     if ($product) {
        $product->stock -= $purchase->qty;
        $latestPurchase = Purchase::where('product_id', $purchase->product_id)
          ->where('id', '!=', $purchase->id)
          ->orderByDesc('date')
          ->first();

        //   $product->price = $latestPurchase ? $latestPurchase->price : 0;
        $product->save();
    }

    $purchase->delete();

    return redirect()->route('purchase.index')->with('success', 'Purchase deleted and stock updated.');
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
