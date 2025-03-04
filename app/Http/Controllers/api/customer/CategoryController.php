<?php

namespace App\Http\Controllers\api\customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Utils\Util;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategories(Request $request)
    {
        try {
            $categoriesQuery = Category::with('childs')
                ->where('parent_category_id', 0)
                ->where('status', 'active')
                ->orderBy('id', 'desc');

            if ($request->has('category_id')) {
                $categoriesQuery->where('id', $request->category_id);
            }
            $categories = $categoriesQuery->get();
            return Util::getSuccessMessage('All Categories', $categories);
        } catch (\Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }
}
