<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10)->where('categoryStatus','Y');
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {

        $categories = Category::all();
        
        return view('admin.category.create', compact('categories'));
    }

    public function store(Request $request)
    {

        try {
            // Create the category
            $category = new Category();
            $category->category_name = $request->category_name;
            $category->parent_id = $request->parent_id[0] == '0' ? 0 : $request->parent_id[0];
            $category->save();

            return response()->json([
                'success' => true,
                'message' => 'Category created successfully!',
                'data' => $category,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create category. Please try again.'
            ], 500);
        }
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
            $category->category_name = $request->category_name;
            $category->parent_id = $request->parent_id[0] == '0' ? 0 : $request->parent_id[0];
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
