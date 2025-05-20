<?php

namespace App\Http\Controllers\vendor;
use Illuminate\Support\Facades\Auth;
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
    // {
    //     //
    //     $user = auth()->user();
    //      if ($user->role === 'vendor') {
    //     $purchases = Purchase::with('product')
    //         ->where('product_id', $user->id)
    //         ->get();
    //      }else{
    //     $purchases = Purchase::with('product')->get();
    //     }
    //     return view('admin.reports.purchaseindex', compact('purchases'));
    // }

    {
    $user = auth()->user();

    if ($user->role === 'vendor') {
        $purchases = Purchase::with('product')
            ->whereHas('product', function ($query) use ($user) {
                $query->where('userId', $user->id);
            })
            ->get();
    } else {
        $purchases = Purchase::with('product')->get();
    }

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

        $purchase = new Purchase([
        'product_id' => $request->product_id,
        'date' => $request->date,
        'price' => $request->price,
        'qty' => $request->qty,
        'status' => $request->status,
        'vendor_id' => Auth::id(), // Assign current vendor
        ]);

        $purchase = Purchase::create($request->all());

        $product = Product::find($request->product_id);
        if ($product) {
            $product->stock += $request->qty;
            $product->productPrice = $request->price;
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
    public function edit($id)
    {
        //
        $purchase = Purchase::findOrFail($id);
        $products = Product::all();
        return view('admin.reports.purchaseedit', compact('purchase', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'purchaseId' => 'required|integer',
            'product_id' => 'required|integer',
            'date' => 'required|date',
            'price' => 'required|integer',
            'qty' => 'required|integer',
            'status' => 'required|in:active,deactive,deleted',
        ]);

        $purchaseId = $request->purchaseId;
        $productId = $request->product_id;

        $purchase = Purchase::findOrFail($purchaseId);
        $product = Product::findOrFail($productId);

        $oldQty = $purchase->qty;
        $oldPrice = $purchase->price;

        $newQty = $request->qty;
        $newPrice = $request->price;

        // Adjust stock
        $stockChange = $newQty - $oldQty;
        $product->stock += $stockChange;

        // Adjust product price based on quantity change
        if ($stockChange != 0) {
            // Weighted average price calculation
            $existingStockBeforeChange = $product->stock - $stockChange;

            if (($existingStockBeforeChange + $newQty) > 0) {
                $product->productPrice = round(
                    (($existingStockBeforeChange * $product->productPrice) + ($newQty * $newPrice)) / ($existingStockBeforeChange + $newQty)
                );
            } else {
                // Fallback to new price if somehow stock becomes 0
                $product->productPrice = $newPrice;
            }
        }

        // Save updated product
        $product->save();

        // Update purchase
        $purchase->product_id = $productId;
        $purchase->date = $request->date;
        $purchase->price = $newPrice;
        $purchase->qty = $newQty;
        $purchase->status = $request->status;
        $purchase->save();

        return redirect()->route('purchase.index')->with('success', 'Purchase updated and stock/price adjusted.');
    }


    /**
     * Helper to calculate weighted average price
     */
    private function calculateAveragePrice($existingQty, $existingPrice, $newQty, $newPrice)
    {
        if (($existingQty + $newQty) == 0) {
            return $newPrice;
        }

        return round((($existingQty * $existingPrice) + ($newQty * $newPrice)) / ($existingQty + $newQty));
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

            $product->productPrice = $latestPurchase ? $latestPurchase->price : 0;
            $product->save();
        }

        $purchase->delete();

        return redirect()->route('purchase.index')->with('success', 'Purchase deleted and stock updated.');
    }
    public function purchaseDateWIse()
    {
        return view('admin.reports.purchaseDateWise');
    }
    public function purchaseDateWiseReport(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        $request->session()->put('start_date', $request->start_date);
        $request->session()->put('end_date', $request->end_date);
        //   $data=Purchase::with("productData")->whereBetween('date',[$request->start_date, $request->end_date])->get();
        // return $data;
        $user = auth()->user();
        $query = Purchase::with("productData")
        ->whereDate('date', '>=', $request->start_date)
        ->whereDate('date', '<=', $request->end_date);
        // $data = Purchase::with("productData")->whereDate('date', '>=', $request->start_date)
        //     ->whereDate('date', '<=', $request->end_date)
        //     ->get();
        if ($user->role === 'vendor') {
        $query->whereHas('productData', function ($q) use ($user) {
            $q->where('userId', $user->id);
        });
    }

    $data = $query->get();
        return view('admin.reports.purchaseDateWiseReport', ['data' => $data]);
    }
    public function purchaseReport()
    {
        //  $purchase=Purchase::with("productData")->get();
        //  return view('admin.reports.purchaseReport',['purchase'=>$purchase]);
        return view('admin.reports.purchaseDateWise');
    }
}
