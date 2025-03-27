<?php

namespace App\Http\Controllers\api\customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Utils\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function products(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'category_id' => 'required',
            ]);

            if ($validator->fails()) {
                return Util::getErrorMessage('validation failed', $validator->errors());
            }
            $language = Auth::user()->default_language;

            $currentPage = $request->input('page', 1);

            $search = $request->input('search');

            $productEnglishFields = ['*', 'productName as displayName', 'productDescription as displayDescription'];
            $productGujaratiFields = ['*', 'productNameGUj as displayName', 'productDescriptionGuj as displayDescription'];
            $productHindiFields = ['*', 'productNameHin as displayName', 'productDescriptionHin as displayDescription'];




            $categories = Category::where('id', $request->category_id)
                ->with('childs')
                ->first();
            if ($categories->parent_category_id == 0) {
                $childCategoryIds = $categories->childs->pluck('id')->toArray();

                $query = Product::with(['productImages', 'productUnit.unitMaster'])
                    ->where('status', 'active')
                    ->whereIn('categoryId', $childCategoryIds)
                    ->select($language == 'Hindi' ? $productHindiFields : ($language == 'Gujarati' ? $productGujaratiFields : $productEnglishFields));
            } else {
                $query = Product::with(['productImages', 'productUnit.unitMaster'])
                    ->where('status', 'active')
                    ->where('categoryId', $request->category_id)
                    ->select($language == 'Hindi' ? $productHindiFields : ($language == 'Gujarati' ? $productGujaratiFields : $productEnglishFields));
            }



            if (!empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('productName', 'LIKE', "%{$search}%");
                });
            }

            $productsQuery = $query->paginate(10, ['*'], 'page', $currentPage);

            $productsQuery->getCollection()->transform(function ($product) {
                $product->productUnit->transform(function ($unit) {
                    if (!isset($unit->unitMaster)) return $unit;
                    $unit->unit = $unit->unitMaster->unit;
                    unset($unit->unitMaster);
                    return $unit;
                });
                return $product;
            });


            return Util::getSuccessMessage('Products', ['products' => $productsQuery]);
        } catch (\Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }

    public function homeProducts()
    {
        try {
            // Get user's preferred language
            $language = Auth::user()->default_language;

            // Define language-based field selections
            $languageFields = [
                'English' => ['*', 'productName as displayName', 'productDescription as displayDescription'],
                'Gujarati' => ['*', 'productNameGUj as displayName', 'productDescriptionGuj as displayDescription'],
                'Hindi' => ['*', 'productNameHin as displayName', 'productDescriptionHin as displayDescription'],
            ];

            // Select fields based on user language (default to English)
            $productFields = $languageFields[$language] ?? $languageFields['English'];

            // Fetch home products with relationships
            $productsQuery = Product::where('status', 'active')
                ->where('isOnHome', 'yes')
                ->with(['productImages', 'productUnit.unitMaster'])
                ->select($productFields)
                ->get();

            // Transform productUnit to remove unitMaster and extract only the unit value
            $productsQuery->transform(function ($product) {
                $product->productUnit->transform(function ($unit) {
                    $unit->unit = optional($unit->unitMaster)->unit; // Avoids undefined property error
                    unset($unit->unitMaster);
                    return $unit;
                });
                return $product;
            });

            return Util::getSuccessMessage('Products', ['products' => $productsQuery]);
        } catch (\Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }
    public function allProducts(Request $request)
    {
        try {
            // Get user's preferred language
            $language = Auth::user()->default_language;
            $currentPage = $request->input('page', 1);
            $search = $request->input('search');

            $productEnglishFields = ['*', 'productName as displayName', 'productDescription as displayDescription'];
            $productGujaratiFields = ['*', 'productNameGUj as displayName', 'productDescriptionGuj as displayDescription'];
            $productHindiFields = ['*', 'productNameHin as displayName', 'productDescriptionHin as displayDescription'];

            $query = Product::with(['productImages', 'productUnit.unitMaster', 'reviews.user'])
                ->where('status', 'active')
                ->select($language == 'Hindi' ? $productHindiFields : ($language == 'Gujarati' ? $productGujaratiFields : $productEnglishFields));

            if (!empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('productName', 'LIKE', "%{$search}%");
                });
            }
            if ($request->has('product_id')) {
                $relatedProducts = Product::where('status', 'active')
                    ->where('id', $request->product_id)
                    ->first();
                $category_id =  $relatedProducts->categoryId;

                $relatedProducts = Product::where('status', 'active')
                    ->where('categoryId', $category_id)
                    ->where('id', '!=', $request->product_id)
                    ->select($language == 'Hindi' ? $productHindiFields : ($language == 'Gujarati' ? $productGujaratiFields : $productEnglishFields))

                    ->get();

                $query->where('id', $request->product_id);
            }

            $productsQuery = $query->paginate(10, ['*'], 'page', $currentPage);

            $productsQuery->getCollection()->transform(function ($product) {
                $product->productUnit->transform(function ($unit) {
                    if (!isset($unit->unitMaster)) return $unit;
                    $unit->unit = $unit->unitMaster->unit;
                    unset($unit->unitMaster);
                    return $unit;
                });
                return $product;
            });
            if ($request->has('product_id')) {
                $productsQuery = $productsQuery->first();
                return Util::getSuccessMessage('Products', ['relatedProducts' => $relatedProducts, 'products' => $productsQuery]);
            } else {
                return Util::getSuccessMessage('Products', ['products' => $productsQuery]);
            }
        } catch (\Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }
}
