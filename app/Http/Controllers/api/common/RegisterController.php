<?php

namespace App\Http\Controllers\api\common;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function registerApi(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'phone' => ['required', 'string', 'min:10', 'max:10'],
            'role' => ['required', 'string', 'max:255'],
            'pro_pic' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors(),
            ];
            return response()->json($response, 400);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->role = $request->role;
        if ($request->hasFile('pro_pic')) {
            $image = $request->file('pro_pic');
            $path = 'profileImage/';
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $imagename);
            $user->pro_pic = $imagename;
        }
        if ($request->is_verfiy_email) {
            $user->is_verfiy_email = $request->is_verfiy_email;
        }
        if ($request->is_verfiy_phone) {
            $user->is_verfiy_phone = $request->is_verfiy_phone;
        }
        // $user->fcm_token = $request->fcm_token;
        if ($request->status) {
            $user->status = $request->status;
        }
        if ($request->is_special) {
            $user->is_special = $request->is_special;
        }
        if ($request->default_language) {
            $user->default_language = $request->default_language;
        }
        $user->save();

        $response = [
            'success' => true,
            'message' => "Registration Successfully",
            'data'    => $user,
        ];
        return response()->json($response, 200);
    }
}
