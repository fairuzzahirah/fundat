<?php
namespace App\Service\OTP;

interface OTPResetService
{
    public function sendOTP(string $email);
    public function verifyOTP(string $email, string $otp);
    public function resetPassword(string $email, string $newPassword);
}
