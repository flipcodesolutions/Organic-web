<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MetaPropertyCategory;
use App\Models\MetaPropertyCategoy;
use App\Models\NavigateMaster;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Unit;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // try {

        $query = Category::query();

        if ($request->filled('global')) {
            $query->where(function ($q) use ($request) {
                $q->where('categoryName', 'like', '%' . $request->global . '%');
                // ->orWhere('categoryId', 'like', '%' . $request->global . '%');
            });
        }

        if ($request->filled('parentCategoryId')) {
            $query->where('parent_category_id', $request->parentCategoryId);
        }

        $data = $query->where('status', 'active')->paginate(10);
        $categories = Category::where([['status', '=', 'active'], ['parent_category_id', '=', 0]])->orderBy('categoryName', 'asc')->get();
        return view('admin.category.index', compact('data', 'categories'));
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
        ])->orderBy('categoryName', 'asc')->get();

        // foreach($categories as $data){
        // $childcat = Category::where([
        //     ['status', '=', 'active'],
        //     ['parent_category_id', '!=', '0']
        // ])->get();
        // }
        // return $childcat;
        return view('admin.category.create', compact('categories'));
        // } catch (\Exception $e) {

        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_name_guj' => 'required',
            'category_name_hin' => 'required',
            'category_des' => 'required',
            'category_des_guj' => 'required',
            'category_des_hin' => 'required',
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'isparent' => 'required_without:parent_id',
            'parent_id' => 'required_without:isparent|exists:categories,id',
            // 'parent_id' => 'required'
        ],[
            'category_name_guj.required' => 'The category name gujarati field is required.',
            'category_name_hin.required' => 'The category name hindi field is required.',
            'category_des.required' => 'The category description field is required.',
            'category_des_guj.required' => 'The category description gujarati field is required.',
            'category_des_hin.required' => 'The category description hindi field is required.',
        ]);
        // try {
        // return $request;
        $category = new Category();
        $category->categoryName = $request->category_name;
        $category->categoryNameGUj = $request->category_name_guj;
        $category->categoryNameHin = $request->category_name_hin;
        $category->categoryDescription = $request->category_des;
        $category->categoryDescriptionGuj = $request->category_des_guj;
        $category->categoryDescriptionHin = $request->category_des_hin;
        // $parentId = isset($request->parent_id) && is_array($request->parent_id) ? $request->parent_id[0] : null;
        // $category->parent_category_id = $parentId === '0' ? 0 : $parentId;

        if ($request->has('isparent')) {
            $category->parent_category_id = 0;
        } else {
            $category->parent_category_id = $request->parent_id;
        }

        if ($request->hasFile('category_image')) {
            $image = $request->file('category_image');
            $path = 'categoryImages/';
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $imagename);
            $category->cat_icon = 'categoryImages/' . $imagename;
        }

        $category->save();

        if ($request->has('is_navigate') && $request->is_navigate == 'true') {
            $navigate = new NavigateMaster();
            $navigate->screenname = 'product_screen/category/' . $category->id;
            $navigate->save();
        }

        if ($request->ogTitleEng !== null || $request->ogTitleGuj !== null || $request->ogTitleHin !== null || $request->ogDescriptionEng !== null || $request->ogDescriptionGuj !== null || $request->ogDescriptionHin !== null || $request->ogUrl !== null || $request->description !== null || $request->keywords !== null || $request->author !== null || $request->tages !== null || $request->hasFile('ogImage')) {
            $metaProperty = new MetaPropertyCategory();
            $metaProperty->categoryId = $category->id;
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
                $image = $request->file('ogImage');
                $path = 'categoryOgImages/';
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $image->move($path, $imagename);
                $metaProperty->ogImage = 'categoryOgImages/' . $imagename;
            }

            $metaProperty->save();
        }

        return redirect()->route('category.index')->with('msg', 'Category Created Successfully!');

        // return response()->json([
        //     'success' => true,
        //     'msg' => 'Category created successfully!',
        //     'data' => $category,
        // ]);
        // } catch (\Exception $e) {
        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }
    }

    public function edit($id)
    {
        // try {
        $category = Category::with('metaproperty')->find($id);
        $categories = Category::where([
            ['status', '=', 'active'],
            ['parent_category_id', '=', 0]
        ])->orderBy('categoryName', 'asc')->get();
        $navigate = NavigateMaster::where('screenname', 'product_screen/category/' . $id)->first();

        return view('admin.category.edit', compact('category', 'categories', 'navigate'));
        // } catch (\Exception $e) {

        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }
    }

    public function update(Request $request, $id)
    {
        // return $request;
        $request->validate([
            'category_name' => 'required',
            'category_name_guj' => 'required',
            'category_name_hin' => 'required',
            'category_des' => 'required',
            'category_des_guj' => 'required',
            'category_des_hin' => 'required',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'parent_id' => 'required'
            'isparent' => 'required_without:parent_id',
            'parent_id' => 'required_without:isparent|exists:categories,id',
        ],[
            'category_name_guj.required' => 'The category name gujarati field is required.',
            'category_name_hin.required' => 'The category name hindi field is required.',
            'category_des.required' => 'The category description field is required.',
            'category_des_guj.required' => 'The category description gujarati field is required.',
            'category_des_hin.required' => 'The category description hindi field is required.',
        ]);
        // try {
        $category = Category::find($id);
        $category->categoryName = $request->category_name;
        $category->categoryNameGUj = $request->category_name_guj;
        $category->categoryNameHin = $request->category_name_hin;
        $category->categoryDescription = $request->category_des;
        $category->categoryDescriptionGuj = $request->category_des_guj;
        $category->categoryDescriptionHin = $request->category_des_hin;
        // $parentId = isset($request->parent_id) && is_array($request->parent_id) ? $request->parent_id[0] : null;
        // $category->parent_category_id = $parentId === '0' ? 0 : $parentId;
        if ($request->has('isparent')) {
            $category->parent_category_id = 0;
        } else {
            $category->parent_category_id = $request->parent_id;
        }

        if ($request->hasFile('category_image')) {
            $image = $request->file('category_image');
            $path = 'categoryImages/';
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $currentimagepath = public_path($category->cat_icon);
            if (file_exists($currentimagepath)) {
                unlink($currentimagepath);
            }
            $image->move($path, $imagename);
            $category->cat_icon = 'categoryImages/' . $imagename;
        }

        // for navigation
        $navigate = NavigateMaster::where('screenname', 'product_screen/category/' . $id)->first();
        if ($request->has('is_navigate') && $request->is_navigate == 'true') {
            if (!$navigate) {
                $newnavigate = new NavigateMaster();
                $newnavigate->screenname = 'product_screen/category/' . $id;
                $newnavigate->save();
            }
        } else {
            if ($navigate) {
                $navigate->delete();
            }
        }

        $category->save();
        // return $id;
        if ($request->ogTitleEng !== null || $request->ogTitleGuj !== null || $request->ogTitleHin !== null || $request->ogDescriptionEng !== null || $request->ogDescriptionGuj !== null || $request->ogDescriptionHin !== null || $request->ogUrl !== null || $request->description !== null || $request->keywords !== null || $request->author !== null || $request->tages !== null || $request->hasFile('ogImage')) {

            if ($request->metaPropertyId) {
                $metaProperty = MetaPropertyCategory::find($request->metaPropertyId);
                $metaProperty->categoryId = $id;
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
                    // return $currentogimagepath;
                    if ($metaProperty->ogImage && file_exists($currentogimagepath)) {
                        unlink($currentogimagepath);
                    }
                    $ogimage = $request->file('ogImage');
                    $ogimagepath = 'categoryOgImages/';
                    $ogimagename = time() . '.' . $ogimage->getClientOriginalExtension();
                    $ogimage->move($ogimagepath, $ogimagename);
                    $metaProperty->ogImage = 'categoryOgImages/' . $ogimagename;
                }

                $metaProperty->save();
            } else {
                $newMetaProperty = new MetaPropertyCategory;
                $newMetaProperty->categoryId = $id;
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
                    $newogimagepath = 'categoryOgImages/';
                    $newogimagename = time() . '.' . $newogimage->getClientOriginalExtension();
                    $newogimage->move($newogimagepath, $newogimagename);
                    $newMetaProperty->ogImage = 'categoryOgImages/' . $newogimagename;
                }

                $newMetaProperty->save();
            }
        }


        return redirect()->route('category.index')->with('msg', 'Category Updated Successfully!');
        // } catch (\Exception $e) {
        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }
    }

    public function deactive($id)
    {
        // try {
        $category = Category::find($id);
        $category->status = 'deactive';
        $category->save();

        return back()->with('msg', 'Category deactivated successfully!');
        // } catch (\Exception $e) {

        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }
    }

    public function active($id)
    {
        // try {
        $category = Category::find($id);
        $category->status = 'active';
        $category->save();
        return back()->with('msg', 'Category activated successfully!');;
        // } catch (\Exception $e) {

        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }
    }

    public function deleted(Request $request)
    {
        // try {
        // $categories = Category::where('status', 'deactive')->paginate(10);
        // return view('admin.category.deactive', compact('categories'));

        $query = Category::query();

        if ($request->filled('global')) {
            $query->where(function ($q) use ($request) {
                $q->where('categoryName', 'like', '%' . $request->global . '%');
                // ->orWhere('categoryId', 'like', '%' . $request->global . '%');
            });
        }

        if ($request->filled('parentCategoryId')) {
            $query->where('parent_category_id', $request->parentCategoryId);
        }

        $data = $query->where('status', 'deactive')->paginate(10);
        $categories = Category::where([['status', '=', 'active'], ['parent_category_id', '=', 0]])->orderBy('categoryName', 'asc')->get();
        return view('admin.category.deactive', compact('data', 'categories'));
        // } catch (\Exception $e) {

        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }
    }

    public function destroy($id)
    {
        // try {
        $product = Product::where('categoryId', $id)->get();

        // foreach ($product as $productdata) {
        //     $productimage = ProductImage::where('productId', $productdata->id)->get();
        //     foreach ($productimage as $imagedata) {
        //         $currentimagepath = public_path($imagedata->url);
        //         if (file_exists($currentimagepath)) {
        //             unlink($currentimagepath);
        //         }
        //         $imagedata->delete();
        //     }

        //     $unit = Unit::where('product_id', $productdata->id)->get();
        //     foreach ($unit as $unitdata) {
        //         $unitdata->delete();
        //     }

        //     $productdata->delete();
        // }
        if ($product->count() > 0) {
            return back()->with('warning', 'First you need to delete the products registered with this category after that you can delete this category!');
        } else {
            $category = Category::find($id);

            $categoryimagepath = public_path($category->cat_icon);
            if (file_exists($categoryimagepath)) {
                unlink($categoryimagepath);
            }

            $navigate = NavigateMaster::where('screenname', 'product_screen/category/' . $id)->first();
            if ($navigate) {
                // return $navigate;
                $navigate->delete();
            }

            $metadata = MetaPropertyCategory::where('categoryID', $id)->first();
            if ($metadata) {
                $currentogimagepath = public_path($metadata->ogImage);
                if ($metadata->ogImage && file_exists($currentogimagepath)) {
                    unlink($currentogimagepath);
                }
                $metadata->delete();
            }

            $category->delete();
            return redirect()->route('category.deactiveindex')->with('msg', 'Category deleted successfully!');
        }
        // } catch (\Exception $e) {

        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }
    }
}
