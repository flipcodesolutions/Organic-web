<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Utils\Util;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategories(Request $request)
    {
        try {
            $currentPage = $request->input('page', 1);
            if ($request->has('category_id')) {
                $categories = Category::with(['childs',  'products'])
                    ->whereHas('products', function ($query) use ($request) {
                        if ($request->has('product_id')) {
                            $query->where('id', $request->product_id);
                        }
                    })
                    ->where('parent_category_id', 0)
                    ->where('id', $request->category_id)
                    ->where('status', 'active')
                    ->orderBy('id', 'desc');
            } else {

                $categoriesQuery = Category::with(['childs',  'products'])
                    ->whereHas('products', function ($query) use ($request) {
                        if ($request->has('product_id')) {
                            $query->where('id', $request->product_id);
                        }
                    })
                    ->where('parent_category_id', 0)
                    ->where('status', 'active')
                    ->orderBy('id', 'desc');
            }
            $categories = $categoriesQuery->paginate($request->input('limit', 10), ['*'], 'page', $currentPage);

            return Util::getSuccessMessage('All Categories', $categories);
        } catch (\Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }
}
