<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Utils\Util;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function sliders(Request $request)
    {
        try {
            $currentPage = $request->input('page', 1);
            $sliders = Slider::with('city', 'navigatemaster')
                ->where('status', 'active')
                ->paginate($request->input('limit', 10), ['*'], 'page', $currentPage);

            return Util::getSuccessMessage('Sliders', $sliders);
        } catch (\Exception $e) {
            return Util::getErrorMessage($e->getMessage());
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
