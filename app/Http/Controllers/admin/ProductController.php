<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['categories','prodcutImages'])->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
            $request->validate([
                'product_image'=>'required'
            ]);
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
                $productimg = $request->file('product_image')[0];  // Access the first uploaded file
                $imageName = time() . '_' . uniqid() . '.' . $productimg->getClientOriginalExtension();
                $product->image = $imageName;
                
                $product->save();

                foreach ($request->file('product_image') as $imgdata) {
                    if ($imgdata->isValid()) {
                        // Generate a unique image filename
                        $imageName = time() . '_' . uniqid() . '.' . $imgdata->getClientOriginalExtension();
                        $imageext = $imgdata->getClientOriginalExtension(); // Corrected method
                        
                        if($imageext == 'jpeg' || $imageext == 'jpg' || $imageext == 'png' || $imageext == 'jfif'){

                            $imgType = 'photo';
                            // Move the image to the public directory
                            $imgdata->move(public_path('productImage/'), $imageName);
                        }
                        else if($imageext == 'mp4' || $imageext == 'avi' || $imageext == 'mov' || $imageext == 'mkv'){
                            $imgType = 'video';
                            $imgdata->move(public_path('productVideo/'), $imageName);
                        }
                        
                        // Save the image information in the product_images table
                        ProductImage::create([
                            'productId' => $product->id, // Associate the image with the new product
                            'url' => $imageName,
                            'type' => $imgType
                        ]);
                    }
                }
            }
           return redirect()->route('product.index');
        
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $productimg = ProductImage::where('productId',$id)->get();
        $categories = Category::all();
        
        return view('admin.product.edit', compact('product', 'categories','productimg'));
    }

    public function update(Request $request, $id)
    {
        return $request;
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
