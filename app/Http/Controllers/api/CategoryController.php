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

        $currentPage = $request->input('page', 1);
        $categoriesQuery = Category::with('parentCategory', 'childCategories', 'products');
        $categories = $categoriesQuery->paginate($request->input('limit', 10), ['*'], 'page', $currentPage);

        return Util::getSuccessMessage('All Categories', $categories);
    }
}
