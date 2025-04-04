<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AddToCart;
use App\Models\Category;
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
        
            $request->session()->regenerate();
            session(['user_id' => Auth::id()]);
        
            dd(session()->all()); // Debug session data
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    

    // public function visitorlogout()
    // {

    // }

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
        if (Auth::user() && Auth::user() != null) {

            $existingCartItem = AddToCart::where('userId', Auth::user()->id)
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
            $cart->userId = Auth::user()->id;
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
                // "message" => "Product added succesfully to cart"
            ]);
        }
    }

    public function cartindex()
    {
        $category = Category::where('status', 'active')->orderby('categoryName', 'asc')->get();
        if (Auth::user() &&  Auth::user() != null) {
            $cart = AddToCart::where('userId', Auth::user()->id)->with('products.productImages', 'units.unitMaster')->get();
            $address = ShippingAddress::where('user_id', Auth::user()->id)->with('landmark')->get();

            return view('visitor.cart', compact('category', 'cart', 'address'));
        }
        else
        {
            return view('visitor.cart',compact('category'));
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
}
