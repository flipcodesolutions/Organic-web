<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        return view("visitor.layouts.header");
    }

    public function autocomplete(Request $request)
    {
        return Product::query()
                ->where('productName', 'like', '%' . $request->search . '%')
            //    ->where("name", "LIKE", "%{$request->search}%")
               ->take(12)
               ->get();
    }
}
