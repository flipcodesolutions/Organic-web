<?php

namespace App\Http\Controllers\api\customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Utils\Util;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function products(Request $request)
    {
        try {
            $currentPage = $request->input('page', 1);
            $search = $request->input('search');

            // Start query with relationships
            $query = Product::with(['productImages', 'productUnit.unitMaster']);

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
