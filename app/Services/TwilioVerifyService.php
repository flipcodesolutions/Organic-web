<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioVerifyService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
    }

    public function sendOtp($phone)
    {
        return $this->client->verify->v2->services(env('TWILIO_VERIFY_SID'))
            ->verifications
            ->create("+91" . $phone, "sms");
    }


    // Verify OTP
    public function verifyOtp($phone, $otp)
    {
        try {
            return $this->client->verify->v2->services(env('TWILIO_VERIFY_SID'))
                ->verificationChecks
                ->create([
                    "to" => "+91" . $phone,
                    "code" => $otp
                ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => "OTP verification failed.",
                "error" => $e->getMessage()
            ], 400);
        }
    }
}
