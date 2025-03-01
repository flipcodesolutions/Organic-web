<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Unit;
use App\Models\UnitMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        try {
            $products = Product::where('status', 'active')->whereHas('categories', function ($query) {
                $query->where('status', 'active');
            })->with(['categories','productImages'])->paginate(10);
            
            // $products = Product::where('status', 'active')->whereHas('categories', function ($query) {
            //     $query->where('status', 'active');
            // })->with(['categories', 'productImages', 'productUnit.unitMaster'=> function($query){
            //     $query->where('status','active')->select('id','unit');
            // }])->paginate(10);
            // return $products;  
            return view('admin.product.index', compact('products'));
        } catch (\Exception $e) {

            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        }
    }

    public function create()
    {
        try {

            $categories = Category::where('status', 'active')->get();
            $units = UnitMaster::where('status', 'active')->get();
            return view('admin.product.create', compact('categories', 'units'));
        } catch (\Exception $e) {

            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        }
    }

    public function store(Request $request)
    {
        // try {
        // return $request;
        // $request->validate([
        //     'product_image' => 'required'
        // ]);
        $product = new Product();
        $product->productName = $request->product_name;
        $product->productNameGuj = $request->product_name_guj;
        $product->productNameHin = $request->product_name_hin;
        $product->productDescription = $request->product_des;
        $product->productDescriptionGuj = $request->product_des_guj;
        $product->productDescriptionHin = $request->product_des_hin;
        $product->productPrice = $request->product_price;
        $product->Stock = $request->product_stock;
        $product->season = $request->season;
        $product->categoryId = $request->category_id;
        $userId = Auth::user()->id;
        $product->userId = $userId;

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

        if ($request->new_video_link !== null) {
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
                'price' => $request->product_price[$i],
                'detail' => $request->unit_det[$i],
                'per' => $request->discount_per[$i],
                'sell_price' => $request->sellin_price[$i]
            ]);
        }

        // Unit::create([
        //     'unit' => $request->unit_id,
        //     'product_id' => $product->id,
        //     'price' => $request->product_price,
        //     'detail' => $request->unit_det,
        //     'per' => $request->discount_per,
        //     'sell_price' => $request->sellin_price
        // ]);

        return redirect()->route('product.index')->with('success', 'Product created successfully!');
        // } catch (\Exception $e) {

        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }
    }

    public function edit($id)
    {
        try {
            $product = Product::with('productImages')->with('productUnit.unitMaster')->find($id);
            // return $product;
            $categories = Category::where('status', 'active')->get();
            $units = UnitMaster::where('status', 'active')->get();

            return view('admin.product.edit', compact('product', 'categories', 'units'));
        } catch (\Exception $e) {

            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!')->with('exception_message', $e->getMessage());;
        }
    }

    public function update(Request $request, $id)
    {
        try {
            return $request;
            $product = Product::find($id);
            $product->productName = $request->product_name;
            $product->productNameGuj = $request->product_name_guj;
            $product->productNameHin = $request->product_name_hin;
            $product->productDescription = $request->product_des;
            $product->productDescriptionGuj = $request->product_des_guj;
            $product->productDescriptionHin = $request->product_des_hin;
            $product->productPrice = $request->product_price;
            $product->stock = $request->product_stock;
            $product->season = $request->season;
            $product->categoryId = $request->category_id;
            $product->save();

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

            $product->image = ProductImage::where(['productId' => $id,])->first()->url;
            $product->save();

            for ($i = 0; $i < count($request->unit_id); $i++) {
                Unit::where('product_id',$id)->update([
                    'unit' => $request->unit_id[$i],
                    'price' => $request->product_price[$i],
                    'detail' => $request->unit_det[$i],
                    'per' => $request->discount_per[$i],
                    'sell_price' => $request->sellin_price[$i]
                ]);
            }

            // Unit::where('product_id', $id)->update([
            //     'unit' => $request->unit_id,
            //     'price' => $request->product_price,
            //     'detail' => $request->unit_det,
            //     'per' => $request->discount_per,
            //     'sell_price' => $request->sellin_price
            // ]);

            return redirect()->route('product.index')->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {

            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        }
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
        // } catch (\Illuminate\Validation\ValidationException $e) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => $e->errors()
        //     ]);
        // }
    }

    public function deactive($id)
    {
        try {
            $product = Product::find($id);
            $product->status = 'deactive';
            $product->save();

            // $productimg = ProductImage::where('productId', $id)->update(['status' => 'deactive']);


            return redirect()->back()->with('success', 'Product deactivated successfully!');
        } catch (\Exception $e) {

            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        }
    }

    public function deactiveindex()
    {
        try {
            $products = Product::where('status', 'deactive')->with(['categories', 'productImages', 'productUnit.unitMaster'])->paginate(10);
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

            return redirect()->route('product.index')->with('success', 'Product activated successfully!');
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

            return redirect()->back()->with('success', 'Product deleted successfully!');
        } catch (\Exception $e) {

            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        }
    }

    public function destroyimage($id)
    {
        try {

            $image = ProductImage::find($id);
            if ($image->type == 'photo') {
                $currentimagepath = public_path('productImage/' . $image->url);
                if (file_exists($currentimagepath)) {
                    unlink($currentimagepath);
                }
                $image->delete();
                return redirect()->back()->with('success', 'Image deleted successfully!');
            } else {
                $image->delete();
                return redirect()->back()->with('success', 'Video deleted successfully!');
            }
        } catch (\Exception $e) {

            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        }
    }
}
