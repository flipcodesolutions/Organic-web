<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Unit;
use App\Models\UnitMaster;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // try {

            $query = Product::query();

            if ($request->filled('global')) {
                $query->where(function ($q) use ($request) {
                    $q->where('productName', 'like', '%' . $request->global . '%')
                        ->orWhere('categoryId', 'like', '%' . $request->global . '%');
                });
            }

            if ($request->filled('categoryId')) {
                $query->where('categoryID', $request->categoryId);
            }
            if ($request->filled('brandId')) {
                $query->where('brandId', $request->brandId);
            }
            if ($request->filled('season')) {
                $query->where('season', $request->season);
            }

            $data = $query->where('status', 'active')->whereHas('categories', function ($query1) {
                $query1->where('status', 'active');
            })->whereHas('brand',function($query2){
                $query2->where('status','active');
            })->with(['categories', 'brand', 'productImages'])->paginate(10);
            // $products = Product::where('status', 'active')->whereHas('categories', function ($query) {
            //     $query->where('status', 'active');
            // })->with(['categories', 'productImages'])->paginate(10);

            $categories = Category::where([
                ['status', '=', 'active'],
                ['parent_category_id', '=', 0]
            ])->get();
            $childcat = Category::where([
                ['status', '=', 'active'],
                ['parent_category_id', '!=', 0]
            ])->get();
            $brands = Brand::where('status','active')->get();
            // $products = Product::where('status', 'active')->whereHas('categories', function ($query) {
            //     $query->where('status', 'active');
            // })->with(['categories', 'productImages', 'productUnit.unitMaster'=> function($query){
            //     $query->where('status','active')->select('id','unit');
            // }])->paginate(10);
            // return $products;
            return view('admin.product.index', compact('data', 'categories', 'childcat', 'brands'));
        // } catch (\Exception $e) {

        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }
    }

    public function create()
    {
        // try {

            $categories = Category::where([
                ['status', '=', 'active'],
                ['parent_category_id', '=', 0]
            ])->get();
            $childcat = Category::where([
                ['status', '=', 'active'],
                ['parent_category_id', '!=', 0]
            ])->get();
            $units = UnitMaster::where('status', 'active')->get();
            $brands = Brand::where('status','active')->get();
            return view('admin.product.create', compact('categories', 'childcat', 'units', 'brands'));
        // } catch (\Exception $e) {
        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }
    }

    public function store(Request $request)
    {
        // try { 
            // return $request;
            $product = new Product();
            $product->productName = $request->product_name;
            $product->productNameGuj = $request->product_name_guj;
            $product->productNameHin = $request->product_name_hin;
            $product->productDescription = $request->product_des;
            $product->productDescriptionGuj = $request->product_des_guj;
            $product->productDescriptionHin = $request->product_des_hin;
            $product->productPrice = $request->price[0];
            $product->Stock = $request->product_stock;
            $product->season = $request->season;
            $product->categoryId = $request->category_id;
            $product->brandId = $request->brand_id;
            $userId = Auth::user()->id;
            $product->userId = $userId;
            if($request->has('is_on_home') && $request->is_on_home == 'true'){
                $product->isOnHome = 'yes';
            }
            else{
                $product->isOnHome = 'no';
            }

            $product->save();

            if ($request->hasFile('product_image')) {
                $productimg = $request->file('product_image')[0];
                $imageName = time() . '_' . uniqid() . '.' . $productimg->getClientOriginalExtension();
                $product->image = $imageName;

                $product->save();

                foreach ($request->file('product_image') as $imgdata) {
                    if ($imgdata->isValid()) {
                        $imageName = time() . '_' . uniqid() . '.' . $imgdata->getClientOriginalExtension();
                        $imgdata->move(public_path('productImages/'), $imageName);

                        ProductImage::create([
                            'productId' => $product->id,
                            'url' => 'productImages/' . $imageName,
                            'type' => 'photo'
                        ]);
                    }
                }
            }

            // return $request;
            if (isset($request->video_link[0]) && $request->video_link[0] !== null) {
                foreach ($request->video_link as $data) {
                    ProductImage::create([
                        'productId' => $product->id,
                        'url' => $data,
                        'type' => 'video'
                    ]);
                }
            }

            $productimage = ProductImage::where('productId', $product->id)->get();
            $product->image = $productimage->first()->url;
            $product->save();

            // $unit = $request->unit_id;

            for ($i = 0; $i < count($request->unit_id); $i++) {
                Unit::create([
                    'unit' => $request->unit_id[$i],
                    'product_id' => $product->id,
                    'detail' => $request->unit_det[$i],
                    'price' => $request->price[$i],
                    'per' => $request->discount_per[$i],
                    'sell_price' => $request->selling_price[$i]
                ]);
            }

            // Unit::create([
            //     'unit' => $request->unit_id,
            //     'product_id' => $product->id,
            //     'price' => $request->product_price,
            //     'detail' => $request->unit_det,
            //     'per' => $request->discount_per,
            //     'sell_price' => $request->selling_price
            // ]);

            return redirect()->route('product.index')->with('msg', 'Product created successfully!');
        // } catch (\Exception $e) {

        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }
    }

    public function edit($id)
    {
        // try {
            $product = Product::with('productImages')->with('productUnit.unitMaster')->find($id);
            // return $product;
            $categories = Category::where([
                ['status', '=', 'active'],
                ['parent_category_id', '=', 0]
            ])->get();
            $childcat = Category::where([
                ['status', '=', 'active'],
                ['parent_category_id', '!=', 0]
            ])->get();
            $units = UnitMaster::where('status', 'active')->get();
            $brands = Brand::where('status','active')->get();

            return view('admin.product.edit', compact('product', 'categories', 'childcat', 'units', 'brands'));
        // } catch (\Exception $e) {

        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!')->with('exception_message', $e->getMessage());;
        // }
    }

    public function update(Request $request, $id)
    {
        // return $request;
        // try {
        // return $request;
        $product = Product::find($id);
        $product->productName = $request->product_name;
        $product->productNameGuj = $request->product_name_guj;
        $product->productNameHin = $request->product_name_hin;
        $product->productDescription = $request->product_des;
        $product->productDescriptionGuj = $request->product_des_guj;
        $product->productDescriptionHin = $request->product_des_hin;
        // $product->productPrice = $request->product_price;
        $product->stock = $request->product_stock;
        $product->season = $request->season;
        $product->categoryId = $request->category_id;
        $product->brandId = $request->brand_id;
        if($request->has('is_on_home') && $request->is_on_home == 'true'){
            $product->isOnHome = 'yes';
        }
        else{
            $product->isOnHome = 'no';
        }
        // $product->save();

        // for add new video
        if ($request->has('new_video_link')) {
            if ($request->new_video_link[0] !== null) {
                foreach ($request->new_video_link as $data) {
                    ProductImage::create([
                        'productId' => $id,
                        'url' => $data,
                        'type' => 'video'
                    ]);
                }
            }
        }

        // for add new image
        if ($request->hasfile('new_product_images')) {
            foreach ($request->file('new_product_images') as $imgdata) {
                if ($imgdata->isValid()) {
                    $imageName = time() . '_' . uniqid() . '.' . $imgdata->getClientOriginalExtension();
                    $imgdata->move(public_path('productImages/'), $imageName);

                    ProductImage::create([
                        'productId' => $id,
                        'url' => 'productImages/' . $imageName,
                        'type' => 'photo'
                    ]);
                }
            }
        }

        // for add new video
        // if ($request->video_link[0] !== null) {
        //     foreach ($request->video_link as $data) {
        //         ProductImage::create([
        //             'productId' => $id,
        //             'url' => $data,
        //             'type' => $request->image_and_video
        //         ]);
        //     }
        // }

        // // for add new image
        // if ($request->hasfile('product_images')) {
        //     foreach ($request->file('product_images') as $imgdata) {
        //         if ($imgdata->isValid()) {
        //             $imageName = time() . '_' . uniqid() . '.' . $imgdata->getClientOriginalExtension();
        //             $imgdata->move(public_path('productImage/'), $imageName);

        //             ProductImage::create([
        //                 'productId' => $id,
        //                 'url' => $imageName,
        //                 'type' => $request->image_and_video
        //             ]);
        //         }
        //     }
        // }

        // // for update current image or video
        // $productimage = ProductImage::where('productId', $id)->get();

        // foreach ($productimage as $data) {
        //     $videoKey = 'video_link_' . $data->id;
        //     $photoKey = 'product_images_' . $data->id;
        //     $typeKey = 'image_and_video_' . $data->id;

        //     if ($request->$videoKey !== null) {

        //         $currentimagepath = public_path('productImage/' . $data->url);
        //         if (file_exists($currentimagepath)) {
        //             unlink($currentimagepath);
        //         }
        //         $data->type = $request->$typeKey;
        //         $data->url = $request->$videoKey;
        //         $data->save();
        //     }

        //     if ($request->hasFile($photoKey)) {

        //         if ($request->$photoKey->isValid()) {

        //             $currentimagepath = public_path('productImage/' . $data->url);
        //             if (file_exists($currentimagepath)) {
        //                 unlink($currentimagepath);
        //             }

        //             $imageName = time() . '_' . uniqid() . '.' . $request->$photoKey->getClientOriginalExtension();
        //             $request->$photoKey->move(public_path('productImage/'), $imageName);

        //             $data->url = $imageName;
        //             $data->type = 'photo';
        //             $data->save();
        //         }
        //     }
        // }

        if ($request->has('unit_id')) {
            for ($i = 0; $i < count($request->unit_id); $i++) {
                Unit::where('id', $request->dataid[$i])->update([
                    'unit' => $request->unit_id[$i],
                    'price' => $request->product_price[$i],
                    'detail' => $request->unit_det[$i],
                    'per' => $request->discount_per[$i],
                    'sell_price' => $request->selling_price[$i]
                ]);
            }
        }

        if ($request->has('new_unit_id')) {
            if (!empty($request->new_unit_id) && isset($request->new_unit_id[0])) {
                for ($a = 0; $a < count($request->new_unit_id); $a++) {
                    Unit::create([
                        'product_id' => $product->id,
                        'unit' => $request->new_unit_id[$a],
                        'price' => $request->new_product_price[$a],
                        'detail' => $request->new_unit_det[$a],
                        'per' => $request->new_discount_per[$a],
                        'sell_price' => $request->new_selling_price[$a]
                    ]);
                }
            }
        }

        $product->image = ProductImage::where(['productId' => $id,])->first()->url;
        $product->productPrice = Unit::where('product_id', $product->id)->first()->price;
        $product->save();
        // Unit::where('product_id', $id)->update([
        //     'unit' => $request->unit_id,
        //     'price' => $request->product_price,
        //     'detail' => $request->unit_det,
        //     'per' => $request->discount_per,
        //     'sell_price' => $request->selling_price
        // ]);

        return redirect()->route('product.index')->with('msg', 'Product updated successfully!');
        // } catch (\Exception $e) {

        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }
    }


    public function deactive($id)
    {
        // try {
            $product = Product::find($id);
            $product->status = 'deactive';
            $product->save();

            // $productimg = ProductImage::where('productId', $id)->update(['status' => 'deactive']);


            return redirect()->back()->with('msg', 'Product deactivated successfully!');
        // } catch (\Exception $e) {

        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }
    }

    public function deactiveindex(Request $request)
    {
        // try {
            $query = Product::query();

            if ($request->filled('global')) {
                $query->where(function ($q) use ($request) {
                    $q->where('productName', 'like', '%' . $request->global . '%')
                        ->orWhere('categoryId', 'like', '%' . $request->global . '%');
                });
            }

            if ($request->filled('categoryId')) {
                $query->where('categoryID', $request->categoryId);
            }

            if ($request->filled('brandId')) {
                $query->where('brandId', $request->brandId);
            }

            if ($request->filled('season')) {
                $query->where('season', $request->season);
            }

            $data = $query->where('status', 'deactive')->whereHas('categories', function ($query) {
                $query->where('status', 'active');
            })->whereHas('brand',function($query1){
                $query1->where('status','active');
            })->with(['categories', 'productImages'])->paginate(10);

            $categories = Category::where([
                ['status', '=', 'active'],
                ['parent_category_id', '=', 0]
            ])->get();
            $childcat = Category::where([
                ['status', '=', 'active'],
                ['parent_category_id', '!=', 0]
            ])->get();
            $brands = Brand::where('status','active')->get();

            return view('admin.product.deactiveproduct', compact('data', 'categories', 'childcat', 'brands'));
            // $products = Product::where('status', 'deactive')->with(['categories', 'productImages', 'productUnit.unitMaster'])->paginate(10);
            // return $products;
            return view('admin.product.deactiveproduct', compact('products'));
        // } catch (\Exception $e) {

        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }
    }

    public function active($id)
    {
        // try {
            $product = Product::find($id);
            $product->status = 'active';
            $product->save();

            // $productimg = ProductImage::where('productId', $id)->update(['status' => 'active']);

            return back()->with('msg', 'Product activated successfully!');
        // } catch (\Exception $e) {

        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }
    }

    public function destroy($id)
    {
        // try {
            $productunit = Unit::where('product_id', $id)->get();
            // return $productunit;

            $product = Product::find($id);

            $productimg = ProductImage::where('productId', $id)->get();
            foreach ($productimg as $data) {
                $currentimagepath = public_path( $data->url );
                if (file_exists($currentimagepath)) {
                    unlink($currentimagepath);
                }
                $data->delete();
            }

            foreach ($productunit as $data) {

                $data->delete();
            }

            $product->delete();

            return redirect()->back()->with('msg', 'Product deleted successfully!');
        // } catch (\Exception $e) {

        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }
    }

    public function destroyimage($id)
    {
        // try {

            $image = ProductImage::find($id);
            $data = ProductImage::where('productId', $image->productId)->get();
            // if (count($data) > 1) {
            if ($image->type == 'photo') {
                $currentimagepath = public_path($image->url);
                if (file_exists($currentimagepath)) {
                    unlink($currentimagepath);
                }
                $image->delete();
                return redirect()->back()->with('msg', 'Image deleted successfully!');
            } else {
                $image->delete();
                return redirect()->back()->with('msg', 'Video deleted successfully!');
            }
            // } else {
            //     return redirect()->back()->with('error', 'Please add new images/videos before deleting last image/video!');
            // }
        // } catch (\Exception $e) {

        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }
    }

    public function destroyunit($id)
    {
        // try {
            $unit = Unit::find($id);
            $data = Unit::where('product_id', $unit->product_id)->get();
            // if (count($data) > 1) {
            $unit->delete();

            return redirect()->back()->with('msg', 'unit deleted successfully!');
            // } else {
            //     return redirect()->back()->with('error', 'Please add new units before deleting last unit!');
            // }
        // } catch (\Exception $e) {

        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }
    }
}
