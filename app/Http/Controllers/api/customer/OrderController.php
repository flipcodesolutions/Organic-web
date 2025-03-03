<?php

namespace App\Http\Controllers\api\customer;

use App\Http\Controllers\Controller;
use App\Models\AddToCart;
use App\Models\OrderDetail;
use App\Models\OrderMaster;
use App\Utils\Util;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

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
    public function order(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'order.total_order_amt' => 'required',
            'order.dis_amt_point' => 'required',
            'order.total_bill_amt' => 'required',
            'order.delivery_slot_id' => 'required',
            'order.shipping_id' => 'required',
            'order.payment_mode' => 'required',

            'order.orderDetails' => 'required|array',
            'order.orderDetails.*.product_id' => 'required',
            'order.orderDetails.*.quantity' => 'required',
            'order.orderDetails.*.price' => 'required',
            'order.orderDetails.*.unit' => 'required',
            'order.orderDetails.*.total' => 'required',

        ]);

        if ($validator->fails()) {
            return Util::getErrorMessage('Validation Failed', $validator->errors());
        }
        try {
            DB::beginTransaction();
            $order = new OrderMaster();
            $order->userId = Auth::user()->id;
            $order->orderDate = now();
            $order->total_order_amt = $request->order['total_order_amt'];
            $order->dis_amt_point = $request->order['dis_amt_point'];
            $order->total_bill_amt = $request->order['total_bill_amt'];
            $order->delivery_slot_id = $request->order['delivery_slot_id'];
            $order->shipping_id = $request->order['shipping_id'];
            $order->payment_mode = $request->order['payment_mode'];
            $order->order_status = 'Confirmed';
            $order->save();

            foreach ($request->order['orderDetails'] as $orderDetails) {
                $orderDetail = new OrderDetail();
                $orderDetail->orderMasterId = $order->id;
                $orderDetail->productId = $orderDetails['product_id'];
                $orderDetail->qty = $orderDetails['quantity'];
                $orderDetail->price = $orderDetails['price'];
                $orderDetail->unit = $orderDetails['unit'];
                $orderDetail->total = $orderDetails['total'];
                $orderDetail->save();
            }
            DB::commit();

            return Util::getSuccessMessage(
                'Order Placed Successfully',
                ['order' => $order, 'orderDetails' => $orderDetail]
            );
        } catch (Exception $e) {
            DB::rollBack();
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
}
