<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ViewAllController extends Controller
{
    //
    public function viewall()
    {
        $category = Category::where('status', 'active')->orderBy('categoryName', 'asc')->get();
        // $products = Product::paginate(12); // Adjust as needed
        $products = Product::all();
        return view('visitor.viewall.viewall', compact('products','category'));
    }
}
