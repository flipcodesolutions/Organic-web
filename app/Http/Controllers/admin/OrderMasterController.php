<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderMaster;
use App\Models\OrderDetail;
use App\Models\TrackOrder;

class OrderMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = OrderMaster::query();

        if ($request->filled('date') && $request->filled('status')) {
            $query->where(function ($q) use ($request) {
                $q->where('status', 'active')
                    ->whereDate('orderDate', '=', $request->date);
            })->with([
                'user',
                'orderDetails' => function ($query) use ($request) {
                    $query->whereHas('trackorder', function ($q) use ($request) {
                        $q->where('orderStatus', $request->status);
                    })->with([
                        'product',
                        'unit.unitMaster',
                        'trackorder'
                    ]);
                }
            ]);
            $order = $query->orderByDesc('id')->get();
            return view('admin.order_master.index', compact('order'));
        } else if ($request->filled('date')) {
            $query->where(function ($q) use ($request) {
                $q->where('status', 'active')
                    ->whereDate('orderDate', '=', $request->date);
            })->with(['user', 'orderDetails.trackorder', 'orderDetails.product', 'orderDetails.unit.unitMaster']);
            $order = $query->orderByDesc('id')->get();
            return view('admin.order_master.index', compact('order'));
        } else if ($request->filled('status')) {
            $query->where('status', 'active')
                ->with([
                    'user',
                    'orderDetails' => function ($query) use ($request) {
                        $query->whereHas('trackorder', function ($q) use ($request) {
                            $q->where('orderStatus', $request->status);
                        })->with([
                            'product',
                            'unit.unitMaster',
                            'trackorder'
                        ]);
                    }
                ]);
            $order = $query->orderByDesc('id')->get();
            return view('admin.order_master.index', compact('order'));
        } else {
            $order = OrderMaster::where('status', 'active');
            if(Auth::user()->role == 'vendor'){
                $order = $order->with([
                    'user',
                    'orderDetails' => function ($query) {
                        $query->whereHas('trackorder', function ($q) {
                            $q->where('orderStatus', 'pending');
                        })->with([
                            'unit.unitMaster',
                            'trackorder',
                            'product' => function($q){
                                $q->where('userId',Auth::user()->id);
                            }
                        ]);
                    }
                ])->orderByDesc('id')->get();
                }
                else{
                     $order = $order->with([
                    'user',
                    'orderDetails' => function ($query) {
                        $query->whereHas('trackorder', function ($q) {
                            $q->where('orderStatus', 'pending');
                        })->with([
                            'unit.unitMaster',
                            'trackorder',
                            'product'
                        ]);
                    }
                ])->orderByDesc('id')->get();
                }
            // return $orders;
            return view('admin.order_master.index', compact('order'));
        }
    }

//     public function index(Request $request)
// {
//     $isVendor = Auth::check() && Auth::user()->role === 'Vendor';
//     $vendorId = Auth::id();

//     $query = OrderMaster::query();


//     $query->where('status', 'active');

//     if ($request->filled('date')) {
//         $query->whereDate('orderDate', $request->date);
//     }

//     $query->with([
//         'user',
//         'orderDetails' => function ($orderDetailsQuery) use ($request, $isVendor, $vendorId) {

//             if ($request->filled('status')) {
//                 $orderDetailsQuery->whereHas('trackorder', function ($q) use ($request) {
//                     $q->where('orderStatus', $request->status);
//                 });
//             } else {

//                 $orderDetailsQuery->whereHas('trackorder', function ($q) {
//                     $q->where('orderStatus', 'pending');
//                 });
//             }


//             if ($isVendor) {
//                 $orderDetailsQuery->whereHas('product', function ($q) use ($vendorId) {
//                     $q->where('userId', $vendorId);
//                 });
//             }

//             $orderDetailsQuery->with(['product', 'unit.unitMaster', 'trackorder']);
//         }
//     ]);

//     $orders = $query->orderByDesc('id')->get();

//     return view('admin.order_master.index', compact('orders'));
// }

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
    public function update(Request $request, $id)
    {

        $status = TrackOrder::find($id);
        $status->orderStatus = $request->status;
        $status->save();

        return response()->json(['status' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function orderReport()
    {

        $data = OrderMaster::with(['user', 'orderDetails.product', 'shippingAddress'])
            ->get();
        return view('admin.reports.orderReport', ['data' => $data]);
        // return $data;
    }

    public function billgeneration($id)
    {
        $data = OrderMaster::find($id);
        //  return $data;
        return view('admin.reports.bill', ['data' => $data]);
    }
}
