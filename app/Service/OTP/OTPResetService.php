<?php
namespace App\Service\OTP;

use Mail;
use App\Mail\OTPMail;


interface OTPResetService

{
    public function sendOTP(string $email);

    public function verifyOTP(string $email, string $otp);
    
    public function resetPassword(string $email, string $newPassword);
}
