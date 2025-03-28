<?php

namespace App\Http\Controllers\api\customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Utils\Util;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function allCategories(Request $request)
    {
        try {
            $language = Auth::user()->default_language;

            $categoriesEnglishFields = ['*', 'categoryName as displayName', 'categoryDescription as displayDescription'];
            $categoriesGujaratiFields = ['*', 'categoryNameGUj as displayName', 'categoryDescriptionGuj as displayDescription'];
            $categoriesHindiFields = ['*', 'categoryNameHin as displayName', 'categoryDescriptionHin as displayDescription'];

            $childEnglishFields = ['categories.*', 'categoryName as displayName', 'categoryDescription as displayDescription'];
            $childGujaratiFields = ['categories.*', 'categoryNameGUj as displayName', 'categoryDescriptionGuj as displayDescription'];
            $childHindiFields = ['categories.*', 'categoryNameHin as displayName', 'categoryDescriptionHin as displayDescription'];


            // $categoriesQuery = Category::with(['childs' => function ($query) use ($language, $childEnglishFields, $childGujaratiFields, $childHindiFields) {
            //     $query->select($language == 'Hindi' ? $childHindiFields : ($language == 'Gujarati' ? $childGujaratiFields : $childEnglishFields));
            //     $query->whereHas('products');
            // }])
            //     ->select($language == 'Hindi' ? $categoriesHindiFields : ($language == 'Gujarati' ? $categoriesGujaratiFields : $categoriesEnglishFields))
            //     ->where('parent_category_id', 0)
            //     ->whereHas('childs', function ($query) {
            //         $query->whereHas('products'); // Ensures parent categories are retrieved only if at least one child has products
            //     })
            //     ->where('status', 'active')
            //     ->orderBy('id', 'desc');
            $categoriesQuery = Category::select($language == 'Hindi' ? $categoriesHindiFields : ($language == 'Gujarati' ? $categoriesGujaratiFields : $categoriesEnglishFields))
                ->where('parent_category_id', 0)
                ->whereHas('childs', function ($query) {
                    $query->whereHas('products');
                })
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

    public function idWiseCategory(Request $request)
    {
        try {
            $language = Auth::user()->default_language;

            $categoriesEnglishFields = ['*', 'categoryName as displayName', 'categoryDescription as displayDescription'];
            $categoriesGujaratiFields = ['*', 'categoryNameGUj as displayName', 'categoryDescriptionGuj as displayDescription'];
            $categoriesHindiFields = ['*', 'categoryNameHin as displayName', 'categoryDescriptionHin as displayDescription'];
            $childEnglishFields = ['categories.*', 'categoryName as displayName', 'categoryDescription as displayDescription'];
            $childGujaratiFields = ['categories.*', 'categoryNameGUj as displayName', 'categoryDescriptionGuj as displayDescription'];
            $childHindiFields = ['categories.*', 'categoryNameHin as displayName', 'categoryDescriptionHin as displayDescription'];


            $categories = Category::where('id', $request->category_id)
                ->with('childs', function ($query) use ($language, $childEnglishFields, $childGujaratiFields, $childHindiFields) {
                    $query->select($language == 'Hindi' ? $childHindiFields : ($language == 'Gujarati' ? $childGujaratiFields : $childEnglishFields));
                    $query->whereHas('products', function ($q) {
                        $q->where('status', 'active');
                    });
                })
                ->select($language == 'Hindi' ? $categoriesHindiFields : ($language == 'Gujarati' ? $categoriesGujaratiFields : $categoriesEnglishFields))
                ->first();

            return Util::getSuccessMessage('Categories', $categories);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }
}
