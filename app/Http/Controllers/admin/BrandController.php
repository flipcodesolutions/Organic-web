<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Brand::query();

        if ($request->filled('global')) {
            $query->where(function ($q) use ($request) {
                $q->where('brand_name', 'like', '%' . $request->global . '%');
                // ->orWhere('categoryId', 'like', '%' . $request->global . '%');
            });
        }

        $data = $query->where('status', 'active')->paginate(10);
        return view('admin.brand.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brandName' => 'required',
            'brand_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $newbrand = new Brand();
        $newbrand->brand_name = $request->brandName;
        if ($request->has('brand_image')) {
            $image = $request->file('brand_image');
            $path = 'brandImages/';
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $imagename);
            $newbrand->brand_icon = 'brandImages/' . $imagename;
        }
        $newbrand->save();

        return redirect()->route('brand.index')->with('msg', 'Brand Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'brandName' => 'required',
            'brand_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $newbrand = Brand::find($id);
        $newbrand->brand_name = $request->brandName;
        if ($request->has('brand_image')) {
            $image = $request->file('brand_image');
            $path = 'brandImages/';
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $currentimagepath = public_path($newbrand->brand_icon);
            if (file_exists($currentimagepath)) {
                unlink($currentimagepath);
            }
            $image->move($path, $imagename);
            $newbrand->brand_icon = 'brandImages/' . $imagename;
        }

        $newbrand->save();

        return redirect()->route('brand.index')->with('msg', 'Brand Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::where('brandId', $id)->get();

        if ($product->count() > 0) {
            return back()->with('warning', 'First you need to delete the products registered with this brand after that you can delete this brand!');
        } else {
            $brand = Brand::find($id);
            $currentimagepath = public_path($brand->brand_icon);
            if (file_exists($currentimagepath)) {
                unlink($currentimagepath);
            }
            $brand->delete();
            return back()->with('msg', 'Brand Deleted Successfully!');
        }

    }

    public function deactive($id)
    {
        $brand = Brand::find($id);
        $brand->status = 'deactive';
        $brand->save();

        return back()->with('msg', 'Brand Deactivated Successfully!');
    }

    public function deactiveindex(Request $request)
    {
        $query = Brand::query();

        if ($request->filled('global')) {
            $query->where(function ($q) use ($request) {
                $q->where('brand_name', 'like', '%' . $request->global . '%');
                // ->orWhere('categoryId', 'like', '%' . $request->global . '%');
            });
        }

        $data = $query->where('status', 'deactive')->paginate(10);
        return view('admin.brand.deactiveindex', compact('data'));
    }

    public function active($id)
    {
        $brand = Brand::find($id);
        $brand->status = 'active';
        $brand->save();

        return back()->with('msg', 'Brand Activated Successfully!');
    }
}
