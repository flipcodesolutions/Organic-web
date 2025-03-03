<?php

namespace App\Http\Controllers\api\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AddToCart;
use App\Utils\Util;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'unit' => 'required',
        ]);

        if ($validator->fails()) {
            return Util::getErrorMessage('Validation Failed', $validator->errors());
        }
        try {

            $cart = new AddToCart();
            $cart->userId = Auth::user()->id;
            $cart->productId = $request->product_id;
            $cart->qty = $request->quantity;
            $cart->price = $request->price;
            $cart->unit = $request->unit;
            $cart->save();

            return Util::getSuccessMessage('Cart Added Successfully', $cart);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
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
    public function cartList(Request $request)
    {
        try {
            $currentPage = $request->input('page', 1);
            $carts = AddToCart::where('userId', Auth::user()->id)
                ->paginate($request->input('limit', 10), ['*'], 'page', $currentPage);
            return Util::getSuccessMessage('Cart List', $carts);
        } catch (Exception $e) {
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

    /**
     * Update the specified resource in storage.
     */
    public function updateCart(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'price' => 'required',
            'unit' => 'required',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return Util::getErrorMessage('Validation Failed', $validator->errors());
        }

        try {

            $cart = AddToCart::find($id);
            $cart->productId = $request->product_id;
            $cart->price = $request->price;
            $cart->unit = $request->unit;
            $cart->qty = $request->quantity;
            $cart->save();

            return Util::getSuccessMessage('Cart Updated Successfully', $cart);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function removeCart($id)
    {
        try {
            $cart = AddToCart::findOrFail($id);
            $cart->delete();
            return Util::getSuccessMessage('Cart Deleted Successfully', $cart);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }
}
