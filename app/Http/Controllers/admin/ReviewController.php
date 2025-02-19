<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $reviews = Review::with(['product', 'user'])->get();
            return view('admin.reviews.index', compact('reviews'));
        }
        catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e
            ], 500);
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
    public function destroy(Review $review)
    {
        try{
            $review->delete();
            return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully.');
        }
        catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e
            ], 500);
        }
    }
    

}
