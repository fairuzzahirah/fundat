<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\OTPRequest;
use App\Http\Requests\Auth\PasswordResetWithOTPRequest;
use App\Service\OTP\OTPResetService;

class OTPResetController extends Controller
{
    protected $otpResetService;

    public function __construct(OTPResetService $otpResetService)
    {
        $this->otpResetService = $otpResetService;
    }

    public function sendOTP(OTPRequest $request)
    {
        $message = $this->otpResetService->sendOTP($request->email);
        return response()->json(['message' => $message]);
    }

    public function verifyOTP(OTPRequest $request)
    {
        $isVerified = $this->otpResetService->verifyOTP($request->email, $request->otp);
        return response()->json(['message' => __('validation.message.otp_verified')]);
    }

    public function resetPassword(PasswordResetWithOTPRequest $request)
    {
        $message = $this->otpResetService->resetPassword($request->email, $request->password);
        return response()->json(['message' => $message]);
    }
}
