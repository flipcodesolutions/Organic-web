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
        // $activeproduct = Product::where('status','active')->get();
        $products = Product::where('status', 'active')->whereHas('categories', function ($query) {
            $query->where('status', 'active');
        })->with(['categories', 'prodcutImages'])->paginate(10);

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('status', 'active')->get();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
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
            $productimg = $request->file('product_image')[0];  // Access the first uploaded file
            $imageName = time() . '_' . uniqid() . '.' . $productimg->getClientOriginalExtension();
            $product->image = $imageName;

            $product->save();

            foreach ($request->file('product_image') as $imgdata) {
                if ($imgdata->isValid()) {
                    // Generate a unique image filename
                    $imageName = time() . '_' . uniqid() . '.' . $imgdata->getClientOriginalExtension();
                    $imgdata->move(public_path('productImage/'), $imageName);

                    // Save the image information in the product_images table
                    ProductImage::create([
                        'productId' => $product->id, // Associate the image with the new product
                        'url' => $imageName,
                        'type' => $request->image_and_video
                    ]);
                }
            }
        } else {
            $product->image = $request->video_link;
            $product->save();
            ProductImage::create([
                'productId' => $product->id, 
                'url' => $request->video_link,
                'type' => $request->image_and_video
            ]);
        }
        return redirect()->route('product.index')->with('success', 'Product created successfully!');;
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $productimg = ProductImage::where([
            'productId' => $id,
            'status' => 'active'
        ])->get();
        $categories = Category::where('status', 'active')->get();

        return view('admin.product.edit', compact('product', 'categories', 'productimg'));
    }

    public function update(Request $request, $id)
    {
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

        return redirect()->route('product.index')->with('success', 'Product updated successfully!');
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
        $product = Product::find($id);
        $product->status = 'deactive';
        $product->save();

        // $productimg = ProductImage::where('productId', $id)->update(['status' => 'deactive']);


        return redirect()->back()->with('success', 'Product deactivated successfully!');
    }

    public function deactiveindex()
    {
        $products = Product::where('status', 'deactive')->paginate(10);
        return view('admin.product.deactiveproduct', compact('products'));
    }

    public function active($id)
    {
        $product = Product::find($id);
        $product->status = 'active';
        $product->save();

        // $productimg = ProductImage::where('productId', $id)->update(['status' => 'active']);

        return redirect()->route('product.index')->with('success', 'Product activated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        $productimg = ProductImage::where('productId', $id)->get();
        foreach ($productimg as $data) {
            $currentimagepath = public_path('productImage/' . $data->url);
            if (file_exists($currentimagepath)) {
                unlink($currentimagepath);
            }
            $data->delete();
        }
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully!');
    }

    public function deactiveimage($id)
    {

        $image = ProductImage::find($id);
        $image->status = 'deactive';
        $image->save();

        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
}
