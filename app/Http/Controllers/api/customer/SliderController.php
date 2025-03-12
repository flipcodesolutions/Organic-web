<?php

namespace App\Http\Controllers\api\customer;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Utils\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function sliders(Request $request)
    {
        try {
            $language = Auth::user()->default_language;

            $cityEnglishFields = ['*', 'city_name_eng as displayName', 'area_eng as displayArea'];
            $cityGujaratiFields = ['*', 'city_name_guj as displayName', 'area_guj as displayArea'];
            $cityHindiFields = ['*', 'city_name_hin as displayName', 'area_hin as displayArea'];

            $sliders = Slider::with(['city' => function ($q) use ($language, $cityEnglishFields, $cityGujaratiFields, $cityHindiFields) {
                $q->select($language == 'Hindi' ? $cityHindiFields : ($language == 'Gujarati' ? $cityGujaratiFields : $cityEnglishFields));
            }, 'navigatemaster'])
                ->where('status', 'active')
                ->get();

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
