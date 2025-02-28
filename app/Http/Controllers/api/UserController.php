<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utils\Util;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Services\TwilioVerifyService;

class UserController extends Controller
{
    protected $twilioService;

    public function __construct(TwilioVerifyService $twilioService)
    {
        $this->twilioService = $twilioService;
    }

    public function sendOtp(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'phone' => 'required',
            ]);
            if ($validator->fails()) {
                Util::getErrorMessage('Validation Failed', $validator->errors());
            }
            // $otp = rand(1000, 9999);
            $this->twilioService->sendOtp($request->phone);


            return  Util::getSuccessMessage('OTP sent successfully');
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }

    public function verifyOtp(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'otp' => 'required',
                'phone' => 'required|digits:10'
            ]);

            if ($validator->fails()) {
                return Util::getErrorMessage("Validation failed", $validator->errors());
            }

            $verification = $this->twilioService->verifyOtp($request->phone, $request->otp);

            if ($verification->status !== 'approved') {
                return Util::getErrorMessage("Invalid OTP. Please try again.");
            }

            // Check if user already exists
            $user = User::where('phone', $request->phone)->first();

            if (!$user) {
                $user = new User();
                $user->phone = $request->phone;
                $user->is_verify_phone = 'yes';
                $user->save();
            }

            // Generate authentication token
            $token = $user->createToken('auth_token')->plainTextToken;

            return Util::getSuccessMessage('User logged in successfully', [
                'token' => $token,
                'user' => $user
            ]);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return Util::getSuccessMessage(
            'All Users',
            $users
        );
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
