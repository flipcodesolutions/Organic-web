<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {

        $categories = Category::all();
        return view('admin.category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // return $request;
            // Create the category
            $category = new Category();
            $category->categoryName = $request->category_name;
            $category->categoryNameGUj = $request->category_name_guj;
            $category->categoryNameHin = $request->category_name_hin;
            $category->categoryDescription = $request->category_des;
            $category->categoryDescriptionGuj = $request->category_des_guj;
            $category->categoryDescriptionHin = $request->category_des_hin;
            $parentId = isset($request->parent_id) && is_array($request->parent_id) ? $request->parent_id[0] : null;
            $category->parent_category_id = $parentId === '0' ? 0 : $parentId;
            
            if($request->hasFile('category_image')){
                $image = $request->file('category_image');
                $path = 'categoryImage/';
                $imagename = time().'.'.$image->getClientOriginalExtension();
                $image->move($path,$imagename);
                $category->cat_icon = $imagename;
            }

            $category->save();

            return response()->json([
                'success' => true,
                'message' => 'Category created successfully!',
                'data' => $category,
            ]);
       
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        return view('admin.category.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {

        try {
            $category = Category::find($id);
            $category->categoryName = $request->category_name;
            $category->categoryNameGUj = $request->category_name_guj;
            $category->categoryNameHin = $request->category_name_hin;
            $category->categoryDescription = $request->category_des;
            $category->categoryDescriptionGuj = $request->category_des_guj;
            $category->categoryDescriptionHin = $request->category_des_hin;
            $parentId = isset($request->parent_id) && is_array($request->parent_id) ? $request->parent_id[0] : null;
            $category->parent_category_id = $parentId === '0' ? 0 : $parentId;
            if($request->hasFile('category_image')){
                $image = $request->file('category_image');
                $path = 'categoryImage/';
                $imagename = time().'.'.$image->getClientOriginalExtension();
                $image->move($path,$imagename);
                $currentimagepath = public_path('categoryImage/'.$category->cat_icon);
                unlink($currentimagepath);
                $category->cat_icon = $imagename;
            }
            $category->save();

            return response()->json([
                'success' => true,
                'message' => 'Category updated successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update category. Please try again.'
            ], 500);
        }
    }
}
