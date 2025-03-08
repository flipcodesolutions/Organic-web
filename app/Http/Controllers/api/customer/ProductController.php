<?php

namespace App\Http\Controllers\api\customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Utils\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function products(Request $request)
    {
        try {
            $language = Auth::user()->default_language;
            $currentPage = $request->input('page', 1);
            $search = $request->input('search');
            $productEnglishFields = ['*', 'productName as displayName', 'productDescription as displayDescription'];
            $productGujaratiFields = ['*', 'productNameGUj as displayName', 'productDescriptionGuj as displayDescription'];
            $productHindiFields = ['*', 'productNameHin as displayName', 'productDescriptionHin as displayDescription'];

            // Start query with relationships
            $query = Product::with(['productImages', 'productUnit.unitMaster'])
                ->where('status', 'active')
                ->select($language == 'Hindi' ? $productHindiFields : ($language == 'Gujarati' ? $productGujaratiFields : $productEnglishFields));

            if (!empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('productName', 'LIKE', "%{$search}%");
                });
            }

            $productsQuery = $query->paginate(10, ['*'], 'page', $currentPage);

            $productsQuery->getCollection()->transform(function ($product) {
                $product->productUnit->transform(function ($unit) {
                    $unit->unit = $unit->unitMaster->unit;
                    unset($unit->unitMaster);
                    return $unit;
                });
                return $product;
            });

            return Util::getSuccessMessage('Products', $productsQuery);
        } catch (\Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
