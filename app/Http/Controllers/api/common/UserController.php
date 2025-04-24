<?php

namespace App\Http\Controllers\api\common;

use App\Http\Controllers\Controller;
use App\Models\Cms_Master;
use App\Models\User;
use App\Utils\Util;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Services\TwilioVerifyService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    protected $twilioService;

    public function __construct(TwilioVerifyService $twilioService)
    {
        $this->twilioService = $twilioService;
    }

    public function checkEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return Util::getErrorMessage('Validation Failed', $validator->errors());
        }
        try {
            $user = User::where('email', $request->email)->first();

            if ($user) {
                Auth::login($user);
                return Util::getSuccessMessageWithToken('User already registered', $user, $user->createToken('my-app-token')->plainTextToken);
            } else {
                return Util::getErrorMessage('User not registered', ['error' => 'User not registered']);
            }
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }


    public function sendOtp(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'phone' => 'required',
            ]);

            if ($validator->fails()) {
                return Util::getErrorMessage('Validation failed.', $validator->errors());
            }

            $contactNo = $request->input('contactNo');
            $otp = rand(1000, 9999);
            $user = User::where('phone', $request->phone)->first();

            if ($user) {
                $user->otp = $otp;
                $user->save();
                return Util::getSuccessMessage('OTP sent successfully', [
                    'isNewUser' => false,
                    'otp' => $otp,
                ]);
            } else {
                Cache::put('otp_' . $contactNo, $otp, now()->addMinutes(5)); // 5 min expiry

                return Util::getSuccessMessage('User not registered', [
                    'isNewUser' => true,
                    'otp' => $otp,
                ]);
            }
        } catch (\Exception $e) {
            return Util::getErrorMessage('Failed to send OTP.', $e->getMessage());
        }
    }

    // public function verifyOtp(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'phone' => 'required|digits:10',
    //         'otp' => 'required|digits:4',
    //         'latitude' => 'nullable',
    //         'longitude' => 'nullable',
    //     ]);

    //     if ($validator->fails()) {
    //         return Util::getErrorMessage("Validation failed", $validator->errors());
    //     }

    //     try {
    //         $user = User::where('phone', $request->phone)->first();

    //         if (!$user || $user->otp != $request->otp) {
    //             return Util::getErrorMessage("Invalid OTP. Please try again.");
    //         }

    //         // OTP verified, update phone status
    //         $user->is_verify_phone = 'yes';
    //         $user->latitude = $request->latitude;
    //         $user->longitude = $request->longitude;
    //         $user->otp = null; // optional: clear OTP after use
    //         $user->save();

    //         // Create token
    //         $token = $user->createToken('auth_token')->plainTextToken;

    //         return Util::getSuccessMessage('User logged in successfully', [
    //             'token' => $token,
    //             'user' => $user,
    //         ]);
    //     } catch (\Exception $e) {
    //         return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
    //     }
    // }


    public function verifyOtp(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'phone' => 'required|digits:10',
                'otp' => 'required|digits:4',
                'latitude' => 'nullable',
                'longitude' => 'nullable',
            ]);

            if ($validator->fails()) {
                return Util::getErrorMessage("Validation failed", $validator->errors());
            }

            $contactNo = $request->input('contactNo');
            $otp = $request->input('otp');

            $user = User::where('phone', $request->phone)->first();

            if ($user && $user->otp == $otp) {
                $token = $user->createToken('auth_token')->plainTextToken; // 🧠 Laravel Sanctum

                return Util::getSuccessMessage('OTP verified successfully', [
                    'user' => $user,
                    'token' => $token,
                    'isNewUser' => false,
                ]);
            }

            $cachedOtp = Cache::get('otp_' . $contactNo);
            if (!$user && $cachedOtp == $otp) {
                return Util::getSuccessMessage('OTP verified for unregistered user', [
                    'isNewUser' => true,
                    'contactNo' => $contactNo,
                ]);
            }

            return Util::getErrorMessage('Invalid OTP.');
        } catch (\Exception $e) {
            return Util::getErrorMessage('OTP verification failed.', $e->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $users = User::all();
            return Util::getSuccessMessage(
                'All Users',
                $users
            );
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }

    public function userProfile()
    {
        try {
            $user = Auth::user();
            return Util::getSuccessMessage(
                'User Profile',
                $user
            );
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }

    public function isVerified(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'is_verify_email' => $request->is_verify_phone ? '' : 'required|in:yes,no',
            'is_verify_phone' => $request->is_verify_email ? '' : 'required|in:yes,no',
        ]);

        if ($validator->fails()) {
            return Util::getErrorMessage('Validation Failed', $validator->errors());
        }
        try {
            $user = Auth::user()->id;
            $user = User::find($user);

            $user->is_verfiy_email = $request->is_verify_email ?? $user->is_verfiy_email;

            $user->is_verify_phone = $request->is_verify_phone ?? $user->is_verify_phone;

            if ($request->is_verify_email || $request->is_verify_phone) {
                $user->save();
            }
            return Util::getSuccessMessage(
                'User Profile',
                $user
            );
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }
    public function createProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'unique:users',
        ]);

        if ($validator->fails()) {
            return Util::getErrorMessage('Validation Failed', $validator->errors());
        }
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            if ($request->pro_pic) {


                $imageName = time() . '.' . $request->pro_pic->extension();
                $request->pro_pic->move(public_path('user_profile'), $imageName);
                $user->pro_pic =  $imageName;
            }
            $user->save();

            return Util::getSuccessMessageWithToken('Profile Updated Successfully', $user, $user->createToken('my-app-token')->plainTextToken);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }

    public function editProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,id,' . Auth::user()->id,
            'phone' => 'unique:users,id,' . Auth::user()->id,
            'pro_pic' => 'required',
        ]);

        if ($validator->fails()) {
            return Util::getErrorMessage('Validation Failed', $validator->errors());
        }
        try {
            $userId = Auth::user()->id;

            $user = User::find($userId);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $imageName = time() . '.' . $request->pro_pic->extension();
            $request->pro_pic->move(public_path('user_profile'), $imageName);
            $user->pro_pic =  $imageName;
            $user->save();

            return Util::getSuccessMessage('Profile Updated Successfully', $user);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }

    public function updateLanguage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'default_language' => 'required',
        ]);

        if ($validator->fails()) {
            return Util::getErrorMessage('Validation Failed', $validator->errors());
        }
        try {
            $userId = Auth::user()->id;

            $user = User::find($userId);
            $user->default_language = $request->default_language;
            $user->save();

            return Util::getSuccessMessage('Language Updated Successfully', $user);
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
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'role' => 'required',
                'phone' => 'required',
            ]);
            if ($validator->fails()) {
                $response = [
                    'success' => false,
                    'message' => $validator->errors(),
                ];
                return response()->json($response, 400);
            }

            $input = $request->all();
            $password = Hash::make($input['password']);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = $password;
            $user->role = $request->role;
            // $user->assignRole($request->input('role'));

            return Util::getSuccessMessage('User Created Success fully', $user);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', $e);
        }
    }

    /**
     * Display the specified resource.
     */


    public function updateFcmToken(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fcm_token' => 'required',
        ]);
        if ($validator->fails()) {
            return Util::getErrorMessage('Validation Failed', $validator->errors());
        }
        try {
            $userId = Auth::user()->id;
            $user = User::find($userId);
            $user->fcm_token = $request->fcm_token;
            $user->save();
            return Util::getSuccessMessage('Fcm Token Updated Successfully', $user);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }
}
