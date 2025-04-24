<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AddToCart;
use App\Models\Category;
use App\Models\CityMaster;
use App\Models\DeliverySlot;
use App\Models\LandmarkMaster;
use App\Models\OrderDetail;
use App\Models\OrderMaster;
use App\Models\PointPer;
use App\Models\Product;
use App\Models\Review;
use App\Models\Shipping_address;
use App\Models\ShippingAddress;
use App\Models\Slider;
use App\Models\TrackOrder;
use App\Models\Unit;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;

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

    public function sendotp(Request $request)
    {
        $apiurl = "https://vegi.psolution.in/api/sendOtp";

        $apiresponse = Http::post($apiurl, [
            'phone' => $request->phone
        ]);

        if ($apiresponse->successful()) {
            $data = $apiresponse->json();
            $nestedData = $data['data'] ?? [];

            // session([
            //     'phone' => $request->phone,
            //     'otp' => $nestedData['otp'] ?? null,
            //     'isnew' => $nestedData['isNewUser'] ?? null,
            // ]);

            return response()->json(['status' => true, 'otp' => $nestedData['otp']], 200);
        } else {
            return response()->json(['status' => false, 'message' => 'OTP sending failed'], 500);
        }
    }

    public function verifyotp(Request $request)
    {
        $apiurl = "https://vegi.psolution.in/api/verifyOtp";

        $apiresponse = Http::post($apiurl, [
            'phone' => $request->phone,
            'otp' => $request->otp
        ]);

        if ($apiresponse->successful()) {
            $data = $apiresponse->json();
            if ($data['success'] == true) {
                if ($data['data']['isNewUser'] == false) {
                    $user = User::where('phone', $request->phone)->first();
                    session(['user' => $user]);
                    return response()->json(['success' => true], 200);
                } else {
                    $user = new User();
                    $user->phone = $request->phone;
                    $user->save();
                    // $user = User::where('phone', $request->phone)->first();
                    session(['newuser' => $user]);
                    return response()->json(['success' => true, 'newuser' => true], 200);
                }
            } else {
                return response()->json($data);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'OTP vreification failed'], 500);
        }

        // if ($request->phone == session('phone') && $request->otp == session('otp')) {
        //     if (session('isnew') == true) {
        //         return 'hyy';
        //     } else {
        //         $user = User::where('phone', $request->phone)->first();
        //         session(['user' => $user]);
        //         return response()->json(['success' => true], 200);
        //     }
        // } else {
        //     return response()->json(['otpverificationsuccess' => false], 200);
        // }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {

                session(['user' => $user]);

                return redirect()->intended('/');
            } else {
                $newUser = User::updateOrCreate(['email' => $user->email], [
                    'name' => $user->name,
                    'google_id' => $user->id,
                    'password' => encrypt('123456dummy')
                ]);
                session(['newuser' => $newUser]);
                return redirect()->route('visitor.userregistrationindex');
                return redirect()->route('/');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function userregistrationindex()
    {

        $category = Category::where('status', 'active')->orderby('categoryName', 'asc')->get();
        $city = CityMaster::orderby('city_name_eng', 'asc')->get();
        $landmark = LandmarkMaster::orderby('landmark_eng', 'asc')->get();

        return view('visitor.userregistration', compact('category', 'city', 'landmark'));
    }

    public function userregistration(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phonenumber' => 'required|numeric|digits:10',
            'profilepicture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'addressline1' => 'required',
            'addressline2' => 'required',
            'pincode' => 'required|numeric|digits:6',
            'city' => 'required',
            'landmark' => 'required'
        ], [
            'phonenumber.required' => 'The mobile number field is required.',
            'phonenumber.numeric' => 'The mobile number field must be a number.',
            'phonenumber.digits' => 'The mobile number field must be 10 digits.',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phonenumber;

        if ($request->hasFile('profilepicture')) {
            $image = $request->profilepicture;

            $profilepic = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $user->pro_pic = $profilepic;
            
            $image->move(public_path('user_profile/'), $profilepic);
        }

        $user->save();

        $address = new ShippingAddress();
        $address->user_id = $id;
        $address->address_line1 = $request->addressline1;
        $address->address_line2 = $request->addressline2;
        $address->pincode = $request->pincode;
        $address->landmark_id = $request->landmark;

        $address->save();

        session()->forget('user');
        session(['user'=>$user]);

        return redirect()->route('visitor.index');        
    }

    public function visitorlogout()
    {
        session()->flush();

        return redirect()->route('visitor.index');
    }

    public function profile()
    {
        $category = Category::where('status', 'active')->orderby('categoryName', 'asc')->get();
        if (session('user')) {
            $user = User::find(session('user')->id);

            return view('visitor.userprofile', compact('category', 'user'));
        } else {
            return view('visitor.userprofile', compact('category'));
        }
    }

    public function updateprofile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phonenumber' => 'required|numeric|digits:10'
        ], [
            'phonenumber.required' => 'The mobile number field is required.',
            'phonenumber.numeric' => 'The mobile number field must be a number.',
            'phonenumber.digits' => 'The mobile number field must be 10 digits.',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phonenumber;

        if ($request->hasFile('profilePic')) {
            $image = $request->profilePic;

            $profilepic = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $currentimagepath = public_path('user_Profile/' . $user->pro_pic);
            $user->pro_pic = $profilepic;
            if (file_exists($currentimagepath)) {
                unlink($currentimagepath);
            }
            $image->move(public_path('user_profile/'), $profilepic);
        }
        $user->save();

        return redirect()->back();
    }

    public function addressindex()
    {
        $category = Category::where('status', 'active')->orderby('categoryName', 'asc')->get();
        $address = ShippingAddress::where('user_id', session('user')->id)->with('landmark.citymaster')->get();
        // return $address;
        return view('visitor.useraddress', compact('category', 'address'));
    }

    public function addaddress($id)
    {
        $category = Category::where('status', 'active')->orderby('categoryName', 'asc')->get();
        $city = CityMaster::orderby('city_name_eng', 'asc')->get();
        $landmark = LandmarkMaster::orderby('landmark_eng', 'asc')->get();

        return view('visitor.addnewaddress', compact('category', 'city', 'landmark'));
    }

    public function storeaddress(Request $request, $id)
    {
        $request->validate([
            'addressline1' => 'required',
            'addressline2' => 'required',
            'pincode' => 'required|numeric|digits:6',
            'city' => 'required',
            'landmark' => 'required'
        ]);
        $address = new ShippingAddress();
        $address->user_id = $id;
        $address->address_line1 = $request->addressline1;
        $address->address_line2 = $request->addressline2;
        $address->pincode = $request->pincode;
        $address->landmark_id = $request->landmark;
        $address->save();

        return redirect()->route('visitor.addressindex');
    }

    public function editaddress($id)
    {
        $category = Category::where('status', 'active')->orderby('categoryName', 'asc')->get();
        $address = ShippingAddress::with('landmark')->find($id);
        $city = CityMaster::orderby('city_name_eng', 'asc')->get();
        $landmark = LandmarkMaster::orderby('landmark_eng', 'asc')->get();

        return view('visitor.editaddress', compact('category', 'address', 'city', 'landmark'));
    }

    public function updateaddress(Request $request, $id)
    {
        $request->validate([
            'addressline1' => 'required',
            'addressline2' => 'required',
            'pincode' => 'required|numeric|digits:6',
            'city' => 'required',
            'landmark' => 'required'
        ]);

        $address = ShippingAddress::find($id);
        $address->user_id = session('user')->id;
        $address->address_line1 = $request->addressline1;
        $address->address_line2 = $request->addressline2;
        $address->pincode = $request->pincode;
        $address->landmark_id = $request->landmark;
        $address->save();

        return redirect()->route('visitor.addressindex');
    }

    public function deleteaddress($id)
    {
        ShippingAddress::find($id)->delete();

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
            $cart = AddToCart::where('userId', session('user')->id)->with(['products' => function ($query) {
                $query->where('status', 'active')->with('productImages');
            }, 'units' => function ($query1) {
                $query1->where('status', 'active')->with('unitMaster');
            }])->get();
            $address = ShippingAddress::where('user_id', session('user')->id)->with('landmark')->get();
            $pointper = PointPer::first();


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
        $order->delivery_slot_id = 1;
        if ($request->paymentmethod == 1) {
            $order->payment_mode = 'cash';
        } else {
            $order->payment_mode = 'online';
        }

        $address = ShippingAddress::with('landmark.citymaster')->find($request->addressId);

        $order->addressLine1 = $address->address_line1;
        $order->addressLine2 = $address->address_line2;
        $order->landmark = $address->landmark->landmark_eng;
        $order->area = $address->landmark->citymaster->area_eng;
        $order->city = $address->landmark->citymaster->city_name_eng;
        $order->pincode = $address->pincode;

        $order->save();

        for ($i = 0; $i < count($request->productId); $i++) {
            $orderDetails = new OrderDetail();
            $orderDetails->Ordermasterid = $order->id;
            $orderDetails->productId = $request->productId[$i];
            $orderDetails->qty = $request->productQty[$i];
            $orderDetails->price = $request->productPrice[$i];
            $orderDetails->unit = $request->productUnit[$i];
            $orderDetails->total = $request->productPrice[$i] * $request->productQty[$i];
            $orderDetails->save();

            $track = new TrackOrder();
            $track->orderDetailId = $orderDetails->id;
            $track->save();
        }

        $cart = AddToCart::where('userId', $request->userId)->delete();

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
        $order = OrderMaster::with('orderDetails', 'orderDetails.product', 'orderDetails.unit', 'orderDetails.unit.unitMaster', 'orderDetails.trackorder')->find($id);
        // return $order;
        return view('visitor.orderdetails', compact('category', 'order'));
    }

    public function productreview(Request $request)
    {
        $review = new Review();
        $review->product_id = $request->productId;
        $review->user_id = $request->userId;
        $review->message = $request->review;
        $review->star = $request->rating;
        $review->save();

        return redirect()->back();
    }
}
