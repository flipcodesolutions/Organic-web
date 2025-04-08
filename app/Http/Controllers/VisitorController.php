<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AddToCart;
use App\Models\Category;
use App\Models\DeliverySlot;
use App\Models\OrderDetail;
use App\Models\OrderMaster;
use App\Models\PointPer;
use App\Models\Product;
use App\Models\Shipping_address;
use App\Models\ShippingAddress;
use App\Models\Slider;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        $slider = Slider::where('status', 'active')->with('navigatemaster')->get();
        $category = Category::where('status', 'active')->orderby('categoryName', 'asc')->get();
        $product = Product::where('status', 'active')->with('productUnit.unitMaster', 'productImages')->orderby('productName', 'asc')->get();
        // return $slider;

        return view('visitor.index', compact('slider', 'category', 'product'));
    }

    public function visitorlogin()
    {
        $category = Category::where('status', 'active')->orderby('categoryName', 'asc')->get();

        return view('visitor.login', compact('category'));
    }

    public function visitorauthenticate(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'active'])) {
            $user = User::where('email', $request->email)->first();

            Auth::loginUsingId($user->id);

            session(['user' => $user]);
            session(['user_id' => $user->id]);

            return redirect()->route('visitor.index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    public function visitorlogout()
    {
        session()->flush();

        return redirect()->back();
    }

    public function category(Request $request, $id)
    {
        $category = Category::where('status', 'active')->orderby('categoryName', 'asc')->get();
        $childcategory = Category::where([['status', '=', 'active'], ['parent_category_id', '=', $id]])->with('products')->orderby('categoryName', 'asc')->get();

        $query = Product::query();

        if ($request->filled('categoryId')) {
            $query->where([['categoryId', '=', $request->categoryId], ['status', '=', 'active']]);
        } else {
            $childCategoryIds = $childcategory->pluck('id')->toArray();
            $query->where('status', 'active')->whereIn('categoryId', $childCategoryIds);
        }
        $product = $query->with(['productImages', 'productUnit.unitMaster'])->get();

        return view('visitor.category', compact('category', 'childcategory', 'product'));
    }

    public function product($id)
    {
        $category = Category::where('status', 'active')->orderby('categoryName', 'asc')->get();
        $product = Product::with('productUnit.unitMaster', 'productImages', 'reviews.user')->find($id);
        $similarproduct = Product::where([['status', '=', 'active'], ['categoryId', '=', $product->categoryId]])->get();
        return view('visitor.product', compact('product', 'category', 'similarproduct'));
    }

    public function addtocart(Request $request)
    {
        if (session()->has('user')) {
            $existingCartItem = AddToCart::where('userId', session('user')->id)
                ->where('productId', $request->unit_id['product_id'])
                ->where('unit', $request->unit_id['id'])
                ->first();

            if ($existingCartItem) {
                return response()->json([
                    "status" => false,
                    "message" => "This product is already in your cart"
                ]);
            }

            $cart = new AddToCart();
            $cart->userId = session('user')->id;
            $cart->productId = $request->unit_id['product_id'];
            $cart->qty = $request->quantity;
            $cart->price = $request->total_amount;
            $cart->unit = $request->unit_id['id'];
            $cart->save();

            return response()->json([
                "status" => true,
                "message" => "Product added succesfully to cart"
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "please login first"
            ]);
        }
    }

    public function cartindex()
    {
        $category = Category::where('status', 'active')->orderby('categoryName', 'asc')->get();
        if (session()->has('user')) {
            $cart = AddToCart::where('userId', session('user')->id)->with('products.productImages', 'units.unitMaster')->get();
            $address = ShippingAddress::where('user_id', session('user')->id)->with('landmark')->get();
            $pointper = PointPer::first();
            // return $cart;
            $deliveryslot = DeliverySlot::where('status', 'active')->get();

            return view('visitor.cart', compact('category', 'cart', 'address', 'deliveryslot', 'pointper'));
        } else {
            return view('visitor.cart', compact('category'));
        }
    }

    public function deletecart($id)
    {
        $cart = AddToCart::find($id);
        $cart->delete();

        return redirect()->back();
        // return response()->json([
        //     "status" => true,
        //     "message" => "Product removed succesfully from cart"
        // ]);
    }

    public function placeorder(Request $request)
    {
        $order = new OrderMaster();
        $order->userId = $request->userId;
        $order->total_order_amt = $request->totalPrice;
        $order->dis_amt_point = $request->pointper;
        $order->total_bill_amt = $request->totalBillAmmount;
        $order->delivery_slot_id = $request->addressId;
        $order->shipping_id = 1;
        if ($request->paymentmethod == 1) {
            $order->payment_mode = 'cash';
        } else {
            $order->payment_mode = 'online';
        }
        $order->save();

        for ($i = 0; $i < count($request->productId); $i++) {
            $oredrDetails = new OrderDetail();
            $oredrDetails->Ordermasterid = $order->id;
            $oredrDetails->productId = $request->productId[$i];
            $oredrDetails->qty = $request->productQty[$i];
            $oredrDetails->price = $request->productPrice[$i];
            $oredrDetails->unit = $request->productUnit[$i];
            $oredrDetails->total = $request->productPrice[$i] * $request->productQty[$i];
            $oredrDetails->save();
        }

        return redirect()->back();
    }

    public function orderindex()
    {
        $category = Category::where('status', 'active')->orderby('categoryName', 'asc')->get();
        if (session()->has('user')) {
            $order = OrderMaster::where('userId', session('user')->id)->with('orderDetails', 'orderDetails.product', 'orderDetails.unit')->get();

            return view('visitor.order', compact('category', 'order'));
        } else {
            return view('visitor.order', compact('category'));
        }
    }

    public function orderdetail($id)
    {
        $category = Category::where('status', 'active')->orderby('categoryName', 'asc')->get();
        $order = OrderMaster::with('shippingadd.landmark','orderDetails','orderDetails.product','orderDetails.unit','orderDetails.unit.unitMaster')->find($id);
        // return $order;

        return view('visitor.orderdetails',compact('category','order'));
    }
}
