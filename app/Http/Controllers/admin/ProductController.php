<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
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
        try {

            $query = Product::query();

            if ($request->filled('global')) {
                $query->where(function ($q) use ($request) {
                    $q->where('productName', 'like', '%' . $request->global . '%')
                        ->orWhere('categoryId', 'like', '%' . $request->global . '%');
                });
            }

            if ($request->filled('categoryId')) {
                $query->where('categoryID', $request->CategoryId);
            }
            if ($request->filled('season')) {
                $query->where('season', $request->season);
            }

            $data = $query->where('status', 'active')->whereHas('categories', function ($query) {
                $query->where('status', 'active');
            })->with(['categories', 'productImages'])->paginate(10);

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
            // $products = Product::where('status', 'active')->whereHas('categories', function ($query) {
            //     $query->where('status', 'active');
            // })->with(['categories', 'productImages', 'productUnit.unitMaster'=> function($query){
            //     $query->where('status','active')->select('id','unit');
            // }])->paginate(10);
            // return $products;  
            return view('admin.product.index', compact('data', 'categories', 'childcat'));
        } catch (\Exception $e) {

            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        }
    }

    public function create()
    {
        try {

            $categories = Category::where([
                ['status', '=', 'active'],
                ['parent_category_id', '=', 0]
            ])->get();
            $childcat = Category::where([
                ['status', '=', 'active'],
                ['parent_category_id', '!=', 0]
            ])->get();
            $units = UnitMaster::where('status', 'active')->get();
            return view('admin.product.create', compact('categories', 'childcat', 'units'));
        } catch (\Exception $e) {
            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        }
    }

    public function store(Request $request)
    {
        // return $request;
        // dd($request->all());

        $request->validate([
            'product_name' => 'required',
            'product_name_guj' => 'required',
            'product_name_hin' => 'required',
            'product_des' => 'required',
            'product_des_guj' => 'required',
            'product_des_hin' => 'required',
            'unit_id' => 'required|array|min:1',
            // 'unit_id.*' => 'required|exists:units,id',
            'unit_det' => 'required|array|min:1',
            'unit_det.*' => 'required|string',
            'price' => 'required|array|min:1',
            'price.*' => 'required|numeric|not_in:null',
            'discount_per' => 'required|array|min:1',
            'discount_per.*' => 'required|numeric',
            'selling_price' => 'required|array|min:1',
            'selling_price.*' => 'required|numeric',
            'product_stock' => 'required',
            'season' => 'required',
            'category_id' => 'required',
            // Ensure that either 'product_image' or 'video_link' is provided
            'product_image' => 'nullable|array|min:1|required_without:video_link',
            'video_link' => 'nullable|array|min:1|required_without:product_image',
        ], [
            'product_image.required_without' => 'You must provide either a product image or a video link.',
            'video_link.required_without' => 'You must provide either a product image or a video link.',
        ]);
        // return $request;

        // $request->validate([
        //     'product_name' => 'required',
        //     'product_name_guj' => 'required',
        //     'product_name_hin' => 'required',
        //     'product_des' => 'required',
        //     'product_des_guj' => 'required',
        //     'product_des_hin' => 'required',
        //     'unit_id' => 'required|array|min:1',
        //     'unit_id.*' => 'required|exists:units,id', // No need for 'array' here
        //     'unit_det' => 'required|array|min:1',
        //     'unit_det.*' => 'required|string', // No need for 'array' here
        //     'price' => 'required|array|min:1',
        //     'price.*' => 'required|numeric|not_in:null', // No need for 'array' here
        //     'discount_per' => 'required|array|min:1',
        //     'discount_per.*' => 'required|numeric',
        //     'selling_price' => 'required|array|min:1',
        //     'selling_price.*' => 'required|numeric',
        //     'product_stock' => 'required',
        //     'season' => 'required',
        //     'category_id' => 'required',
        //     'product_image' => 'array|nullable|required_without:video_link',
        //     'video_link' => 'array|nullable|required_without:product_image',
        // ]);

        // $validator = FacadesValidator::make($request->all(),[
        //     'product_name' => 'required',
        //     'product_name_guj' => 'required',
        //     'product_name_hin' => 'required',
        //     'product_des' => 'required',
        //     'product_des_guj' => 'required',
        //     'product_des_hin' => 'required',
        //     'unit_id' => 'required|array|min:1',
        //     'unit_id.*' => 'required|exists:units,id', // No need for 'array' here
        //     'unit_det' => 'required|array|min:1',
        //     'unit_det.*' => 'required|string', // No need for 'array' here
        //     'price' => 'required|array|min:1',
        //     'price.*' => 'required|numeric|not_in:null', // No need for 'array' here
        //     'discount_per' => 'required|array|min:1',
        //     'discount_per.*' => 'required|numeric',
        //     'selling_price' => 'required|array|min:1',
        //     'selling_price.*' => 'required|numeric',
        //     'product_stock' => 'required',
        //     'season' => 'required',
        //     'category_id' => 'required',
        //     'product_image' => 'array|nullable|required_without:video_link',
        //     'video_link' => 'array|nullable|required_without:product_image',

        // ]);

        // if($validator->fails()){
        //     return redirect()->back()->with('msg',$validator->errors());
        // }

        // return $request;
        try {
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
            $userId = Auth::user()->id;
            $product->userId = $userId;
            $product->save();

            if ($request->hasFile('product_image')) {
                $productimg = $request->file('product_image')[0];
                $imageName = time() . '_' . uniqid() . '.' . $productimg->getClientOriginalExtension();
                $product->image = $imageName;

                $product->save();

                foreach ($request->file('product_image') as $imgdata) {
                    if ($imgdata->isValid()) {
                        $imageName = time() . '_' . uniqid() . '.' . $imgdata->getClientOriginalExtension();
                        $imgdata->move(public_path('productImage/'), $imageName);

                        ProductImage::create([
                            'productId' => $product->id,
                            'url' => $imageName,
                            'type' => 'photo'
                        ]);
                    }
                }
            }

            if ($request->video_link !== null) {
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
        } catch (\Exception $e) {

            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        }
    }

    public function edit($id)
    {
        try {
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

            return view('admin.product.edit', compact('product', 'categories', 'childcat', 'units'));
        } catch (\Exception $e) {

            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!')->with('exception_message', $e->getMessage());;
        }
    }

    public function update(Request $request, $id)
    {
        // return $request;
        $validator = FacadesValidator::make($request->all(), [
            'product_name' => 'required',
            'product_name_guj' => 'required',
            'product_name_hin' => 'required',
            'product_des' => 'required',
            'product_des_guj' => 'required',
            'product_des_hin' => 'required',
            'unit_id' => 'required|array|min:1',
            'unit_id.*' => 'required|exists:units,id', // No need for 'array' here
            'unit_det' => 'required|array|min:1',
            'unit_det.*' => 'required|string', // No need for 'array' here
            'product_price' => 'required|array|min:1',
            'product_price.*' => 'required|numeric|not_in:null', // No need for 'array' here
            'discount_per' => 'required|array|min:1',
            'discount_per.*' => 'required|numeric',
            'selling_price' => 'required|array|min:1',
            'selling_price.*' => 'required|numeric',
            'product_stock' => 'required',
            'season' => 'required',
            'category_id' => 'required',
            'product_image' => 'array|nullable|required_without:new_video_link', // Ensure "new_video_link" is correct
            'new_video_link' => 'array|nullable|required_without:product_image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('msg', $validator->errors());
        }

        // $request->validate([
        //     'product_name' => 'required',
        //     'product_name_guj' => 'required',
        //     'product_name_hin' => 'required',
        //     'product_des' => 'required',
        //     'product_des_guj' => 'required',
        //     'product_des_hin' => 'required',
        //     'unit_id' => 'required|array|min:1',
        //     'unit_id.*' => 'required|exists:units,id', // No need for 'array' here
        //     'unit_det' => 'required|array|min:1',
        //     'unit_det.*' => 'required|string', // No need for 'array' here
        //     'price' => 'required|array|min:1',
        //     'price.*' => 'required|numeric|not_in:null', // No need for 'array' here
        //     'discount_per' => 'required|array|min:1',
        //     'discount_per.*' => 'required|numeric',
        //     'selling_price' => 'required|array|min:1',
        //     'selling_price.*' => 'required|numeric',
        //     'product_stock' => 'required',
        //     'season' => 'required',
        //     'category_id' => 'required',
        //     // 'product_image' => 'array|nullable|required_without:video_link',
        //     'video_link' => 'array|nullable|required_without:product_image',
        // ]);
        try {
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
            // $product->save();

            // for add new video
            if ($request->new_video_link[0] !== null) {
                foreach ($request->new_video_link as $data) {
                    ProductImage::create([
                        'productId' => $id,
                        'url' => $data,
                        'type' => 'video'
                    ]);
                }
            }

            // for add new image
            if ($request->hasfile('new_product_images')) {
                foreach ($request->file('new_product_images') as $imgdata) {
                    if ($imgdata->isValid()) {
                        $imageName = time() . '_' . uniqid() . '.' . $imgdata->getClientOriginalExtension();
                        $imgdata->move(public_path('productImage/'), $imageName);

                        ProductImage::create([
                            'productId' => $id,
                            'url' => $imageName,
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


            for ($i = 0; $i < count($request->unit_id); $i++) {
                Unit::where('id', $request->dataid[$i])->update([
                    'unit' => $request->unit_id[$i],
                    'price' => $request->product_price[$i],
                    'detail' => $request->unit_det[$i],
                    'per' => $request->discount_per[$i],
                    'sell_price' => $request->selling_price[$i]
                ]);
            }

            // if ($request->new_unit_id[0] !== null) {
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
            // try {
            //     $product = Product::find($id);
            //     $product->product_name = $request->product_name;
            //     $product->category_id = $request->category_id;
            //     if ($request->Thumbnail) {
            //         $image = $request->file('Thumbnail');
            //         $imageName = $image->getClientOriginalName();
            //         $destinationPath = public_path('collection/product/productimage');
            //         $image->move($destinationPath, $imageName);
            //         $product->Thumbnail = $imageName;
            //     }
            //     $product->save();
            //     return response()->json([
            //         'success' => true,
            //         'message' => 'Product updated successfully!',
            //         'date' => $product,
            //     ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->errors()
            ]);
        }
    }


    public function deactive($id)
    {
        try {
            $product = Product::find($id);
            $product->status = 'deactive';
            $product->save();

            // $productimg = ProductImage::where('productId', $id)->update(['status' => 'deactive']);


            return redirect()->back()->with('msg', 'Product deactivated successfully!');
        } catch (\Exception $e) {

            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        }
    }

    public function deactiveindex(Request $request)
    {
        try {
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
            if ($request->filled('season')) {
                $query->where('season', $request->season);
            }

            $data = $query->where('status', 'deactive')->whereHas('categories', function ($query) {
                $query->where('status', 'active');
            })->with(['categories', 'productImages'])->paginate(10);

            $categories = Category::where([
                ['status', '=', 'active'],
                ['parent_category_id', '=', 0]
            ])->get();
            $childcat = Category::where([
                ['status', '=', 'active'],
                ['parent_category_id', '!=', 0]
            ])->get();

            return view('admin.product.deactiveproduct', compact('data', 'categories', 'childcat'));
            // $products = Product::where('status', 'deactive')->with(['categories', 'productImages', 'productUnit.unitMaster'])->paginate(10);
            // return $products;
            return view('admin.product.deactiveproduct', compact('products'));
        } catch (\Exception $e) {

            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        }
    }

    public function active($id)
    {
        try {
            $product = Product::find($id);
            $product->status = 'active';
            $product->save();

            // $productimg = ProductImage::where('productId', $id)->update(['status' => 'active']);

            return redirect()->route('product.index')->with('msg', 'Product activated successfully!');
        } catch (\Exception $e) {

            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        }
    }

    public function destroy($id)
    {
        try {
            $productunit = Unit::where('product_id', $id)->get();
            // return $productunit;

            $product = Product::find($id);

            $productimg = ProductImage::where('productId', $id)->get();
            foreach ($productimg as $data) {
                $currentimagepath = public_path('productImage/' . $data->url);
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
        } catch (\Exception $e) {

            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        }
    }

    public function destroyimage($id)
    {
        try {

            $image = ProductImage::find($id);
            $data = ProductImage::where('productId', $image->productId)->get();
            // if (count($data) > 1) {
            if ($image->type == 'photo') {
                $currentimagepath = public_path('productImage/' . $image->url);
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
        } catch (\Exception $e) {

            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        }
    }

    public function destroyunit($id)
    {
        try {
            $unit = Unit::find($id);
            $data = Unit::where('product_id', $unit->product_id)->get();
            if (count($data) > 1) {
                $unit->delete();

                return redirect()->back()->with('msg', 'unit deleted successfully!');
            } else {
                return redirect()->back()->with('error', 'Please add new units before deleting last unit!');
            }
        } catch (\Exception $e) {

            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        }
    }
}
