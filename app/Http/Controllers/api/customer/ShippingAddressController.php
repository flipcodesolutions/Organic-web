<?php

namespace App\Http\Controllers\api\customer;

use App\Http\Controllers\Controller;
use App\Models\Shipping_address;
use App\Utils\Util;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ShippingAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function shippingWithLandmark(Request $request)
    {
        try {
            $currentPage = $request->input('page', 1);
            $shippingAddress = Shipping_address::with('landmark')
                ->where('status', 'active')
                ->paginate($request->input('limit', 10), ['*'], 'page', $currentPage);
            return Util::getSuccessMessage('Shipping Address', $shippingAddress);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addShippingAddress(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address_line1' => 'required',
            'address_line2' => 'required',
            'pincode' => 'required',
            'landmark_id' => 'required',
        ]);

        if ($validator->fails()) {
            return Util::getErrorMessage('Validation Failed', $validator->errors());
        }

        try {
            $shippingAddress = new Shipping_address();
            $shippingAddress->address_line1 = $request->address_line1;
            $shippingAddress->address_line2 = $request->address_line2;
            $shippingAddress->pincode = $request->pincode;
            $shippingAddress->user_id = Auth::user()->id;
            $shippingAddress->landmark_id = $request->landmark_id;
            $shippingAddress->save();

            return Util::getSuccessMessage('Shipping Address Added Successfully', $shippingAddress);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function updateShippingAddress(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'address_line1' => 'required',
            'address_line2' => 'required',
            'pincode' => 'required',
            'landmark_id' => 'required',
        ]);

        if ($validator->fails()) {
            return Util::getErrorMessage('Validation Failed', $validator->errors());
        }

        try {
            $shippingAddress = Shipping_address::find($id);
            $shippingAddress->address_line1 = $request->address_line1;
            $shippingAddress->address_line2 = $request->address_line2;
            $shippingAddress->pincode = $request->pincode;
            $shippingAddress->user_id = Auth::user()->id;
            $shippingAddress->landmark_id = $request->landmark_id;
            $shippingAddress->save();

            return Util::getSuccessMessage('Shipping Address Updated Successfully', $shippingAddress);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteShippingAddress($id)
    {
        try {
            $shippingAddress = Shipping_address::find($id);
            $shippingAddress->status = 'deactive';
            $shippingAddress->save();
            return Util::getSuccessMessage('Shipping Address Deleted Successfully', $shippingAddress);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }


    /**
     * Display the specified resource.
     */
    public function shippingWithLandmarkUser(Request $request)
    {
        try {
            $language = Auth::user()->default_language;
            $currentPage = $request->input('page', 1);

            $landmarkEnglishFields = ['*', 'landmark_eng as displayLandmark'];
            $landmarkGujaratiFields = ['*', 'landmark_guj as displayLandmark'];
            $landmarkHindiFields = ['*', 'landmark_hin as displayLandmark'];

            $shippingAddress = Shipping_address::with(['landmark' => function ($query) use ($language, $landmarkEnglishFields, $landmarkGujaratiFields, $landmarkHindiFields) {
                $query->select($language == 'Hindi' ? $landmarkHindiFields : ($language == 'Gujarati' ? $landmarkGujaratiFields : $landmarkEnglishFields));
            }])
                ->where('user_id', Auth::user()->id)
                ->where('status', 'active')
                ->paginate($request->input('limit', 10), ['*'], 'page', $currentPage);
            return Util::getSuccessMessage('Shipping Address', $shippingAddress);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }
}
