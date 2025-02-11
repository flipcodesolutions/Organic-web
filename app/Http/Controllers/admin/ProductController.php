<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories')->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        // return $categories;
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {

            $product = new Product();
            $product->product_name = $request->product_name;
            $product->category_id = $request->category_id;

            if ($request->Thumbnail) {

                $image = $request->file('Thumbnail');
                $imageName = $image->getClientOriginalName();

                $destinationPath = public_path('collection/product/productimage');
                $image->move($destinationPath, $imageName);
                $product->Thumbnail = $imageName;
            }
            $product->save();
            return response()->json([
                'success' => true,
                'message' => 'Product created successfully!',
                'date' => $product,
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->errors()
            ]);
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            $product->product_name = $request->product_name;
            $product->category_id = $request->category_id;
            if ($request->Thumbnail) {
                $image = $request->file('Thumbnail');
                $imageName = $image->getClientOriginalName();
                $destinationPath = public_path('collection/product/productimage');
                $image->move($destinationPath, $imageName);
                $product->Thumbnail = $imageName;
            }
            $product->save();
            return response()->json([
                'success' => true,
                'message' => 'Product updated successfully!',
                'date' => $product,
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->errors()
            ]);
        }
    }
}
