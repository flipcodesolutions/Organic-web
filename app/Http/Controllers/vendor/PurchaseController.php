<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Product;
use Exception;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // $query = Purchase::query();

        // // Global Search
        // if ($request->filled('global')) {
        //     $query->where(function ($q) use ($request) {
        //         $q->where('productName', 'like', '%' . $request->global . '%')
        //             ->orWhere('date', 'like', '%' . $request->global . '%');
        //     });
        // }

        // // Filter by Specific Landmark
        // // Corrected: Using $request->product_id instead of $request->products_id
        // if ($request->filled('product_id')) {
        //     $query->where('product_id', $request->product_id);
        // }

        // $data = $query->where('status', 'active')->with('product')->paginate(10);

        // $products = Product::where('status', 'active')->orderBy('productName', 'asc')->get();

        // // Return view
        // return view('vendor.purchases.index', compact('data', 'products'));


        $purchases = Purchase::where('status', '!=', 'deleted')->get();
        return view('vendor.purchases.index', compact('purchases'));
        // $purchases = Purchase::with('purchase');
        // return view('vendor.purchases.index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('vendor.purchases.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $purchase = Purchase::findOrFail($id);
        // return view('vendor.purchases.edit', compact('purchase'));

        $products = Product::all();

        $purchases = Purchase::find($id);
        return view('vendor.purchases.edit', compact('purchases', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Purchase $purchases)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'date' => 'required|date',
            'price' => 'required|integer',
            'qty' => 'required|integer',
        ]);

        $purchases = Purchase::find($request->purchase_id);
        
        $purchases->product_id = $request->product_id;
        $purchases->date = $request->date;
        $purchases->price = $request->price;
        $purchases->qty = $request->qty;

        $purchases->save();
        return redirect()->route('purchases.index')->with('msg', 'Purchases updated successfully!');

        // $purchase = Purchase::findOrFail($id);
        // $purchase->update($request->all());
        // return redirect()->route('purchases.index')->with('msg', 'Purchase updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deactive($id)
    {
        try {
            $purchases = Purchase::find($id);
            $purchases->status = 'deactive';
            $purchases->save();
            return redirect()->back()->with('msg', 'Purchase deactivated successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function active($id)
    {
        try {
            $purchases = Purchase::find($id);
            $purchases->status = 'active';
            $purchases->save();
            return back()->with('msg', 'Purchase Activated Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function deleted(Request $request)
    {
        try {
            // $query = Purchase::query();

            // // Global Search 
            // if ($request->filled('global')) {
            //     $query->where(function ($q) use ($request) {
            //         $q->where('product_id', 'like', '%' . $request->global . '%');
            //             // ->orWhere('date', 'like', '%' . $request->global . '%');
            //     });
            // }
            // // Filter by Specific Landmark
            // if ($request->filled('product_id')) {
            //     $query->where('product_id', $request->product_id);
            // }

            // $data = $query->where('status', 'deactive')->with('product')->paginate(10);
            // $products = Product::where('status', 'active')->orderBy('productName', 'asc')->get();

            // return view('vendor.purchases.deleted', compact('data','purchase'))->with('msg', 'purchase Deleted Successfully');

            $data = Purchase::where('status', 'deactive')->with('product')->paginate(10);
            $products = Product::where('status', 'active')->orderBy('productName', 'asc')->get();

            return view('vendor.purchases.deleted', compact('data', 'products'))->with('msg', 'purchase Deleted Successfully');

        }
        catch (Exception $e) {
            return redirect()->back()->with('error','An error occurred: '.$e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $purchases = Purchase::find($id);
            $purchases->delete();
            return back()->with('msg', 'Deleted Permanently');
        } 
        catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
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
