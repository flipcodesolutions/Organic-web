<?php

namespace App\Http\Controllers\admin;

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
            $order = OrderMaster::where('status', 'active')
                ->with([
                    'user',
                    'orderDetails' => function ($query) {
                        $query->whereHas('trackorder', function ($q) {
                            $q->where('orderStatus', 'pending');
                        })->with([
                            'product',
                            'unit.unitMaster',
                            'trackorder'
                        ]);
                    }
                ])->orderByDesc('id')->get();

            // return $order;
            return view('admin.order_master.index', compact('order'));
        }
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
