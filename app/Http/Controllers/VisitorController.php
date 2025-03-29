<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        $slider = Slider::where('status','active')->with('navigatemaster')->get();
        $category = Category::where('status','active')->orderby('categoryName','asc')->get();
        $product = Product::where('status','active')->with('productUnit.unitMaster','productImages')->orderby('productName','asc')->get();
        // return $slider;

        return view('visitor.index',compact('slider','category','product'));
    }

    public function category($id)
    {
        $category = Category::where('status','active')->orderby('categoryName','asc')->get();
        $childCategory = Category::where([['status', '=', 'active'],['parent_category_id', '=', $id]])->with('products')->orderby('categoryName','asc')->get();

        // return $childCategory;

        return view('visitor.category',compact('category','childCategory'));
    }

    public function product($id)
    {
        $category = Category::where('status','active')->orderby('categoryName','asc')->get();
        $product = Product::with('productUnit.unitMaster','productImages','reviews.user')->find($id);
        $similarproduct = Product::where([['status', '=', 'active'],['categoryId', '=', $product->categoryId]])->get();
        // return $similerproduct;
        return view('visitor.product',compact('product','category','similarproduct'));
    }
}
