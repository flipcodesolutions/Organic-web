<?php

namespace App\Http\Controllers\api\customer;

use App\Http\Controllers\Controller;
use App\Models\AddToCart;
use App\Models\OrderDetail;
use App\Models\OrderMaster;
use App\Models\PointPer;
use App\Models\Unit;
use App\Utils\Util;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
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
            'order.order_status' => 'required',

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
            $order->order_status = $request->order['order_status'];
            $order->save();

            $orderDetailsData = [];
            foreach ($request->order['orderDetails'] as $orderDetails) {
                $orderDetail = new OrderDetail();
                $orderDetail->orderMasterId = $order->id;
                $orderDetail->productId = $orderDetails['product_id'];
                $orderDetail->qty = $orderDetails['quantity'];
                $orderDetail->price = $orderDetails['price'];
                $orderDetail->unit = $orderDetails['unit'];
                $orderDetail->total = $orderDetails['total'];
                $orderDetail->save();
                $orderDetailsData[] = $orderDetail;
            }
            // return $orderDetail;
            foreach ($request->order['orderDetails'] as $orderDetails) {
                if (array_key_exists('cart_id', $orderDetails) && $orderDetails['cart_id']) {
                    AddToCart::where('id', $orderDetails['cart_id'])->delete();
                }
            }

            DB::commit();

            return Util::getSuccessMessage(
                'Order Placed Successfully',
                ['order' => $order, 'orderDetails' => $orderDetailsData]
            );
        } catch (Exception $e) {
            DB::rollBack();
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }

    public function pointPer()
    {
        try {
            $pointPer = PointPer::first();
            return Util::getSuccessMessage('Success', ['pointPer' => $pointPer]);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }

    public function myOrders(Request $request)
    {
        try {
            $language = Auth::user()->default_language;
            $currentPage = $request->input('page', 1);
            $orders = OrderMaster::where('userId', Auth::user()->id)
                ->with('orderDetails', function ($query) use ($language) {
                    $query->with(['product' => function ($query) use ($language) {
                        if ($language == 'Hindi') {
                            $query->select('*', 'id', 'productNameHin as displayName', 'productDescriptionHin as displayDescription');
                        } else if ($language == 'Gujarati') {
                            $query->select('*', 'id', 'productNameGUj as displayName', 'productDescriptionGuj as displayDescription');
                        } else {
                            $query->select('*', 'id', 'productName as displayName', 'productDescription as displayDescription');
                        }
                    }]);
                })
                ->paginate($request->input('limit', 10), ['*'], 'page', $currentPage);

            return Util::getSuccessMessage('My Orders', $orders);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }

    public function orderDetails($id)
    {
        try {
            $language = Auth::user()->default_language;

            $productEnglishFields = ['*', 'productName as displayName', 'productDescription as displayDescription'];
            $productGujaratiFields = ['*', 'productNameGUj as displayName', 'productDescriptionGuj as displayDescription'];
            $productHindiFields = ['*', 'productNameHin as displayName', 'productDescriptionHin as displayDescription'];

            $orderDetails = OrderDetail::where('id', $id)
                ->with([
                    'product' => function ($query) use ($language, $productEnglishFields, $productGujaratiFields, $productHindiFields) {
                        if ($language == 'Hindi') {
                            $query->select($productHindiFields);
                        } elseif ($language == 'Gujarati') {
                            $query->select($productGujaratiFields);
                        } else {
                            $query->select($productEnglishFields);
                        }
                    },
                    'product.productImages'
                ])
                ->where('status', 'active')
                ->get();
            return Util::getSuccessMessage('Order Details', $orderDetails);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }
}
