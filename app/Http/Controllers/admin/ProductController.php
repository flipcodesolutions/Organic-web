<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MetaPropertyProduct;
use App\Models\NavigateMaster;
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
    // public function index(Request $request)
    // {
    //     // try {

    //     $query = Product::query();

    //     if ($request->filled('global')) {
    //         $query->where(function ($q) use ($request) {
    //             $q->where('productName', 'like', '%' . $request->global . '%')
    //                 ->orWhere('categoryId', 'like', '%' . $request->global . '%');
    //         });
    //     }

    //     if ($request->filled('categoryId')) {
    //         $query->where('categoryID', $request->categoryId);
    //     }
    //     if ($request->filled('brandId')) {
    //         $query->where('brandId', $request->brandId);
    //     }
    //     if ($request->filled('season')) {
    //         $query->where('season', $request->season);
    //     }
    //     if ($request->filled('is_on_home')) {
    //         $query->where('isOnHome', $request->is_on_home);
    //     }

    //     $data = $query->where('status', 'active')->whereHas('categories', function ($query1) {
    //         $query1->where('status', 'active');
    //     })->whereHas('brand', function ($query2) {
    //         $query2->where('status', 'active');
    //     })->with(['categories', 'brand', 'productImages'])->paginate(10);
    //     // $products = Product::where('status', 'active')->whereHas('categories', function ($query) {
    //     //     $query->where('status', 'active');
    //     // })->with(['categories', 'productImages'])->paginate(10);

    //     $categories = Category::where([
    //         ['status', '=', 'active'],
    //         ['parent_category_id', '=', 0]
    //     ])->orderBy('categoryName', 'asc')->get();
    //     $childcat = Category::where([
    //         ['status', '=', 'active'],
    //         ['parent_category_id', '!=', 0]
    //     ])->orderBy('categoryName', 'asc')->get();
    //     $brands = Brand::where('status', 'active')->orderBy('brand_name', 'asc')->get();
    //     // $products = Product::where('status', 'active')->whereHas('categories', function ($query) {
    //     //     $query->where('status', 'active');
    //     // })->with(['categories', 'productImages', 'productUnit.unitMaster'=> function($query){
    //     //     $query->where('status','active')->select('id','unit');
    //     // }])->paginate(10);
    //     // return $products;
    //     return view('admin.product.index', compact('data', 'categories', 'childcat', 'brands'));
    //     // } catch (\Exception $e) {

    //     //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
    //     // }
    // }

//     public function index(Request $request)
// {
//     $query = Product::query();

//     // Filter products for vendors only
//     if (auth()->user()->role === 'vendor') {
//         $query->where('userId', auth()->id());
//     }

//     // Global search
//     if ($request->filled('global')) {
//         $query->where(function ($q) use ($request) {
//             $q->where('productName', 'like', '%' . $request->global . '%')
//               ->orWhere('categoryId', 'like', '%' . $request->global . '%');
//         });
//     }

//     // Other filters
//     if ($request->filled('categoryId')) {
//         $query->where('categoryId', $request->categoryId);
//     }
//     if ($request->filled('brandId')) {
//         $query->where('brandId', $request->brandId);
//     }
//     if ($request->filled('season')) {
//         $query->where('season', $request->season);
//     }
//     if ($request->filled('is_on_home')) {
//         $query->where('isOnHome', $request->is_on_home);
//     }

//     // Final product query
//     $data = $query->where('status', 'active')
//                   ->whereHas('categories', function ($q1) {
//                       $q1->where('status', 'active');
//                   })
//                   ->whereHas('brand', function ($q2) {
//                       $q2->where('status', 'active');
//                   })
//                   ->with(['categories', 'brand', 'productImages'])
//                   ->paginate(10);

//     // Category and brand data
//     $categories = Category::where('status', 'active')
//         ->where('parent_category_id', 0)
//         ->orderBy('categoryName', 'asc')
//         ->get();

//     $childcat = Category::where('status', 'active')
//         ->where('parent_category_id', '!=', 0)
//         ->orderBy('categoryName', 'asc')
//         ->get();

//     $brands = Brand::where('status', 'active')
//         ->orderBy('brand_name', 'asc')
//         ->get();

//     return view('admin.product.index', compact('data', 'categories', 'childcat', 'brands'));
// }

public function index(Request $request)
{
    // Allow only vendors
    // if (!auth()->user()->hasRole('vendor')) {
    //     abort(403, 'Unauthorized action.');
    // }

    $query = Product::query();

    // Filter only products owned by the vendor
    $query->where('userId', auth()->id());

    // Global search
    if ($request->filled('global')) {
        $query->where(function ($q) use ($request) {
            $q->where('productName', 'like', '%' . $request->global . '%')
              ->orWhere('categoryId', 'like', '%' . $request->global . '%');
        });
    }

    // Other filters...
    if ($request->filled('categoryId')) {
        $query->where('categoryId', $request->categoryId);
    }
    if ($request->filled('brandId')) {
        $query->where('brandId', $request->brandId);
    }
    if ($request->filled('season')) {
        $query->where('season', $request->season);
    }
    if ($request->filled('is_on_home')) {
        $query->where('isOnHome', $request->is_on_home);
    }

    $data = $query->where('status', 'active')
                  ->whereHas('categories', function ($q1) {
                      $q1->where('status', 'active');
                  })
                  ->whereHas('brand', function ($q2) {
                      $q2->where('status', 'active');
                  })
                  ->with(['categories', 'brand', 'productImages'])
                  ->paginate(10);

    $categories = Category::where('status', 'active')
        ->where('parent_category_id', 0)
        ->orderBy('categoryName', 'asc')->get();

    $childcat = Category::where('status', 'active')
        ->where('parent_category_id', '!=', 0)
        ->orderBy('categoryName', 'asc')->get();

    $brands = Brand::where('status', 'active')
        ->orderBy('brand_name', 'asc')->get();

    return view('admin.product.index', compact('data', 'categories', 'childcat', 'brands'));
}



    public function create()
    {
        // try {

        $categories = Category::where([
            ['status', '=', 'active'],
            ['parent_category_id', '=', 0]
        ])->orderBy('categoryName', 'asc')->get();
        $childcat = Category::where([
            ['status', '=', 'active'],
            ['parent_category_id', '!=', 0]
        ])->orderBy('categoryName', 'asc')->get();
        $units = UnitMaster::where('status', 'active')->get();
        $brands = Brand::where('status', 'active')->orderBy('brand_name', 'asc')->get();
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

        if ($request->has('is_on_home') && $request->is_on_home == 'true') {
            $product->isOnHome = 'yes';
        } else {
            $product->isOnHome = 'no';
        }

        $product->save();

        if ($request->has('is_navigate') && $request->is_navigate == 'true') {
            $navigate = new NavigateMaster();
            $navigate->screenname = 'product_screen/product/' . $product->id;
            $navigate->save();
        }

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

        // $ogTitleEng = $request->input('ogTitleEng');
        // $ogTitleGuj = $request->input('ogTitleGuj');
        // $ogTitleHin = $request->input('ogTitleHin');
        // $ogDescriptionEng = $request->input('ogDescriptionEng');
        // $ogDescriptionGuj = $request->input('ogDescriptionGuj');
        // $ogDescriptionHin = $request->input('ogDescriptionHin');
        // $ogUrl = $request->input('ogUrl');
        // $description = $request->input('description');
        // $keywords = $request->input('keywords');
        // $author = $request->input('author');
        // $tages = $request->input('tages');

        if ($request->ogTitleEng !== null || $request->ogTitleGuj !== null || $request->ogTitleHin !== null || $request->ogDescriptionEng !== null || $request->ogDescriptionGuj !== null || $request->ogDescriptionHin !== null || $request->ogUrl !== null || $request->description !== null || $request->keywords !== null || $request->author !== null || $request->tages !== null || $request->hasFile('ogImage')) {
            $metaProperty = new MetaPropertyProduct();
            $metaProperty->productId = $product->id;
            $metaProperty->ogTitleEng = $request->ogTitleEng;
            $metaProperty->ogTitleGuj = $request->ogTitleGuj;
            $metaProperty->ogTitleHin = $request->ogTitleHin;
            $metaProperty->ogDescriptionEng = $request->ogDescriptionEng;
            $metaProperty->ogDescriptionGuj = $request->ogDescriptionGuj;
            $metaProperty->ogDescriptionHin = $request->ogDescriptionHin;
            $metaProperty->ogUrl = $request->ogUrl;
            $metaProperty->description = $request->description;
            $metaProperty->keywords = $request->keywords;
            $metaProperty->author = $request->author;
            $metaProperty->tages = $request->tages;

            if ($request->hasFile('ogImage')) {
                $ogimage = $request->file('ogImage');
                $ogimagepath = 'productOgImages/';
                $ogimagename = time() . '.' . $ogimage->getClientOriginalExtension();
                $ogimage->move($ogimagepath, $ogimagename);
                $metaProperty->ogImage = 'productOgImages/' . $ogimagename;
            }

            $metaProperty->save();
        }


        return redirect()->route('product.index')->with('msg', 'Product created successfully!');
        // } catch (\Exception $e) {

        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }
    }

    public function edit($id)
    {
        // try {
        $product = Product::with('productImages')->with('productUnit.unitMaster')->with('metaproperty')->find($id);
        // return $product;
        $categories = Category::where([
            ['status', '=', 'active'],
            ['parent_category_id', '=', 0]
        ])->orderBy('categoryName', 'asc')->get();
        $childcat = Category::where([
            ['status', '=', 'active'],
            ['parent_category_id', '!=', 0]
        ])->orderBy('categoryName', 'asc')->get();
        $units = UnitMaster::where('status', 'active')->get();
        $brands = Brand::where('status', 'active')->orderBy('brand_name', 'asc')->get();
        $navigate = NavigateMaster::where('screenname', 'product_screen/product/' . $id)->first();

        return view('admin.product.edit', compact('product', 'categories', 'childcat', 'units', 'brands', 'navigate'));
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
        if ($request->has('is_on_home') && $request->is_on_home == 'true') {
            $product->isOnHome = 'yes';
        } else {
            $product->isOnHome = 'no';
        }
        // $product->save();

        // for navigation
        $navigate = NavigateMaster::where('screenname', 'product_screen/product/' . $id)->first();
        if ($request->has('is_navigate') && $request->is_navigate == 'true') {
            if (!$navigate) {
                $newnavigate = new NavigateMaster();
                $newnavigate->screenname = 'product_screen/product/' . $id;
                $newnavigate->save();
            }
        } else {
            if ($navigate) {
                $navigate->delete();
            }
        }

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

        if ($request->ogTitleEng !== null || $request->ogTitleGuj !== null || $request->ogTitleHin !== null || $request->ogDescriptionEng !== null || $request->ogDescriptionGuj !== null || $request->ogDescriptionHin !== null || $request->ogUrl !== null || $request->description !== null || $request->keywords !== null || $request->author !== null || $request->tages !== null || $request->hasFile('ogImage')) {

            if ($request->metaPropertyId) {
                $metaProperty = MetaPropertyProduct::find($request->metaPropertyId);
                $metaProperty->productId = $id;
                $metaProperty->ogTitleEng = $request->ogTitleEng;
                $metaProperty->ogTitleGuj = $request->ogTitleGuj;
                $metaProperty->ogTitleHin = $request->ogTitleHin;
                $metaProperty->ogDescriptionEng = $request->ogDescriptionEng;
                $metaProperty->ogDescriptionGuj = $request->ogDescriptionGuj;
                $metaProperty->ogDescriptionHin = $request->ogDescriptionHin;
                $metaProperty->ogUrl = $request->ogUrl;
                $metaProperty->description = $request->description;
                $metaProperty->keywords = $request->keywords;
                $metaProperty->author = $request->author;
                $metaProperty->tages = $request->tages;

                if ($request->hasFile('ogImage')) {
                    $currentogimagepath = public_path($metaProperty->ogImage);
                    if ($metaProperty->ogImage && file_exists($currentogimagepath)) {
                        unlink($currentogimagepath);
                    }
                    $ogimage = $request->file('ogImage');
                    $ogimagepath = 'productOgImages/';
                    $ogimagename = time() . '.' . $ogimage->getClientOriginalExtension();
                    $ogimage->move($ogimagepath, $ogimagename);
                    $metaProperty->ogImage = 'productOgImages/' . $ogimagename;
                }

                $metaProperty->save();
            } else {
                $newMetaProperty = new MetaPropertyProduct();
                $newMetaProperty->productId = $id;
                $newMetaProperty->ogTitleEng = $request->ogTitleEng;
                $newMetaProperty->ogTitleGuj = $request->ogTitleGuj;
                $newMetaProperty->ogTitleHin = $request->ogTitleHin;
                $newMetaProperty->ogDescriptionEng = $request->ogDescriptionEng;
                $newMetaProperty->ogDescriptionGuj = $request->ogDescriptionGuj;
                $newMetaProperty->ogDescriptionHin = $request->ogDescriptionHin;
                $newMetaProperty->ogUrl = $request->ogUrl;
                $newMetaProperty->description = $request->description;
                $newMetaProperty->keywords = $request->keywords;
                $newMetaProperty->author = $request->author;
                $newMetaProperty->tages = $request->tages;

                if ($request->hasFile('ogImage')) {
                    $newogimage = $request->file('ogImage');
                    $newogimagepath = 'productOgImages/';
                    $newogimagename = time() . '.' . $newogimage->getClientOriginalExtension();
                    $newogimage->move($newogimagepath, $newogimagename);
                    $newMetaProperty->ogImage = 'productOgImages/' . $newogimagename;
                }

                $newMetaProperty->save();
            }
        }
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

        if ($request->filled('is_on_home')) {
            $query->where('isOnHome', $request->is_on_home);
        }

        $data = $query->where('status', 'deactive')->whereHas('categories', function ($query) {
            $query->where('status', 'active');
        })->whereHas('brand', function ($query1) {
            $query1->where('status', 'active');
        })->with(['categories', 'productImages'])->paginate(10);

        $categories = Category::where([
            ['status', '=', 'active'],
            ['parent_category_id', '=', 0]
        ])->orderBy('categoryName', 'asc')->get();
        $childcat = Category::where([
            ['status', '=', 'active'],
            ['parent_category_id', '!=', 0]
        ])->orderBy('categoryName', 'asc')->get();
        $brands = Brand::where('status', 'active')->orderBy('brand_name', 'asc')->get();

        return view('admin.product.deactiveproduct', compact('data', 'categories', 'childcat', 'brands'));
        // $products = Product::where('status', 'deactive')->with(['categories', 'productImages', 'productUnit.unitMaster'])->paginate(10);
        // return $products;
        // return view('admin.product.deactiveproduct', compact('products'));
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
            $currentimagepath = public_path($data->url);
            if (file_exists($currentimagepath)) {
                unlink($currentimagepath);
            }
            $data->delete();
        }

        foreach ($productunit as $data) {

            $data->delete();
        }

        $navigate = NavigateMaster::where('screenname', 'product_screen/product/' . $id)->first();
        if ($navigate) {
            $navigate->delete();
        }

        $metadata = MetaPropertyProduct::where('productID', $id)->first();
        if ($metadata) {
            $currentogimagepath = public_path($metadata->ogImage);
            if ($metadata->ogImage && file_exists($currentogimagepath)) {
                unlink($currentogimagepath);
            }
            $metadata->delete();
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

    // public function stockindex(Request $request)
    // {
    //     $query = Product::query();
    //     $data = collect();

    //     if ($request->filled('productId')) {
    //         $query->where('id', $request->productId);
    //         $data = $query->get();
    //     }

    //     $product = Product::where('status', 'active')->get();
    //     return view('admin.product.stockindex', compact('product', 'data'));
    // }

    public function stockindex(Request $request)
{
    $query = Product::query();
    $data = collect();

    // Filter products by userId if the user is a vendor
    if (auth()->check() && auth()->user()->role === 'vendor') {
        $query->where('userId', auth()->id());
    }

    // If a productId is passed in the request, filter by that as well
    if ($request->filled('productId')) {
        $query->where('id', $request->productId);
        $data = $query->get();
    }

    // Get active products related to the logged-in vendor
    $product = $query->where('status', 'active')->get();

    return view('admin.product.stockindex', compact('product', 'data'));
}


    public function stockupdate(Request $request, $id)
    {
        $request->validate([
            'product_stock' => 'required'
        ]);
        $stock = Product::find($id);
        $stock->stock = $request->product_stock;
        $stock->save();

        return redirect()->route('stock.index')->with('msg', 'Product Stock Updated Successfully!');
    }
}
