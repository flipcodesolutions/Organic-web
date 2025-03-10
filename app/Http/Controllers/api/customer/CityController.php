<?php

namespace App\Http\Controllers\api\customer;

use App\Http\Controllers\Controller;
use App\Models\CityMaster;
use App\Utils\Util;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function citiesWithLandmark(Request $request)
    {
        try {
            $language = Auth::user()->default_language;
            $currentPage = $request->input('page', 1);

            $cityEnglishFields = ['*', 'city_name_eng as displayName', 'area_eng as displayArea'];
            $cityGujaratiFields = ['*', 'city_name_guj as displayName', 'area_guj as displayArea'];
            $cityHindiFields = ['*', 'city_name_hin as displayName', 'area_hin as displayArea'];

            $landmarkEnglishFields = ['*', 'landmark_eng as displayLandmark'];
            $landmarkGujaratiFields = ['*', 'landmark_guj as displayLandmark'];
            $landmarkHindiFields = ['*', 'landmark_hin as displayLandmark'];

            $cities = CityMaster::with(['landmark' => function ($query) use ($language, $landmarkEnglishFields, $landmarkGujaratiFields, $landmarkHindiFields) {
                $query->select($language == 'Hindi' ? $landmarkHindiFields : ($language == 'Gujarati' ? $landmarkGujaratiFields : $landmarkEnglishFields));
            }])
                ->where('status', 'active')
                ->select($language == 'Hindi' ? $cityHindiFields : ($language == 'Gujarati' ? $cityGujaratiFields : $cityEnglishFields))
                ->paginate($request->input('limit', 10), ['*'], 'page', $currentPage);
            return Util::getSuccessMessage('Cities', $cities);
        } catch (Exception $e) {
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
