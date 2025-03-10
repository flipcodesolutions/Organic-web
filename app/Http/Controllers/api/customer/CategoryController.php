<?php

namespace App\Http\Controllers\api\customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Utils\Util;
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


            $categoriesQuery = Category::with(['childs' => function ($query) use ($language, $childEnglishFields, $childGujaratiFields, $childHindiFields) {
                $query->select($language == 'Hindi' ? $childHindiFields : ($language == 'Gujarati' ? $childGujaratiFields : $childEnglishFields));
            }])
                ->select($language == 'Hindi' ? $categoriesHindiFields : ($language == 'Gujarati' ? $categoriesGujaratiFields : $categoriesEnglishFields))
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
