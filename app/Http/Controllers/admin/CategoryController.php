<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Unit;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        try {
            
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
            $categories = Category::where([['status', '=', 'active'], ['parent_category_id', '=', 0]])->get();
            return view('admin.category.index', compact('data', 'categories'));
        } catch (\Exception $e) {

            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        }
    }

    public function create()
    {
        // try {
        $categories = Category::where([
            ['status', '=', 'active'],
            ['parent_category_id', '=', 0]
        ])->get();

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
            // 'parent_id' => 'required'
        ]);
        try {
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
            $category->parent_category_id = $request->parent_id;

            if ($request->hasFile('category_image')) {
                $image = $request->file('category_image');
                $path = 'categoryImage/';
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $image->move($path, $imagename);
                $category->cat_icon = $imagename;
            }

            $category->save();

            return redirect()->route('category.index')->with('msg', 'Category Created Successfully!');

            // return response()->json([
            //     'success' => true,
            //     'msg' => 'Category created successfully!',
            //     'data' => $category,
            // ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update category. Please try again.'
            ], 500);
        }
    }

    public function edit($id)
    {
        try {
            $category = Category::find($id);
            $categories = Category::where([
                ['status', '=', 'active'],
                ['parent_category_id', '=', 0]
            ])->get();
            return view('admin.category.edit', compact('category', 'categories'));
        } catch (\Exception $e) {

            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required',
            'category_name_guj' => 'required',
            'category_name_hin' => 'required',
            'category_des' => 'required',
            'category_des_guj' => 'required',
            'category_des_hin' => 'required',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'parent_id' => 'required'
        ]);
        // return $request;
        try {
            $category = Category::find($id);
            $category->categoryName = $request->category_name;
            $category->categoryNameGUj = $request->category_name_guj;
            $category->categoryNameHin = $request->category_name_hin;
            $category->categoryDescription = $request->category_des;
            $category->categoryDescriptionGuj = $request->category_des_guj;
            $category->categoryDescriptionHin = $request->category_des_hin;
            // $parentId = isset($request->parent_id) && is_array($request->parent_id) ? $request->parent_id[0] : null;
            // $category->parent_category_id = $parentId === '0' ? 0 : $parentId;
            $category->parent_category_id = $request->parent_id;
            if ($request->hasFile('category_image')) {
                $image = $request->file('category_image');
                $path = 'categoryImage/';
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $image->move($path, $imagename);
                $currentimagepath = public_path('categoryImage/' . $category->cat_icon);
                unlink($currentimagepath);
                $category->cat_icon = $imagename;
            }
            $category->save();
            return redirect()->route('category.index')->with('msg', 'Category Updated Successfully!');
            // return response()->json([
            //     'success' => true,
            //     'msg' => 'Category updated successfully!'
            // ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update category. Please try again.'
            ], 500);
        }
    }

    public function deactive($id)
    {
        try {
            $category = Category::find($id);
            $category->status = 'deactive';
            $category->save();

            return back()->with('msg', 'Category deactivated successfully!');
        } catch (\Exception $e) {

            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        }
    }

    public function active($id)
    {
        try {
            $category = Category::find($id);
            $category->status = 'active';
            $category->save();
            return redirect()->route('category.index')->with('msg', 'Category activated successfully!');;
        } catch (\Exception $e) {

            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        }
    }

    public function deleted(Request $request)
    {
        try {
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
            $categories = Category::where([['status', '=', 'active'], ['parent_category_id', '=', 0]])->get();
            return view('admin.category.deactive', compact('data', 'categories'));
        } catch (\Exception $e) {

            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::where('categoryId', $id)->get();

            foreach ($product as $productdata) {
                $productimage = ProductImage::where('productId', $productdata->id)->get();
                foreach ($productimage as $imagedata) {
                    $currentimagepath = public_path('productImage/' . $imagedata->url);
                    if (file_exists($currentimagepath)) {
                        unlink($currentimagepath);
                    }
                    $imagedata->delete();
                }

                $unit = Unit::where('product_id', $productdata->id)->get();
                foreach ($unit as $unitdata) {
                    $unitdata->delete();
                }

                $productdata->delete();
            }

            $category = Category::find($id);
            $currentimagepath = public_path('categoryImage/' . $category->cat_icon);
            unlink($currentimagepath);
            $category->delete();
            return redirect()->route('category.deactiveindex')->with('msg', 'Category deleted successfully!');
        } catch (\Exception $e) {

            return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        }
    }
}
