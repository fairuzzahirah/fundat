<?php
namespace App\Service\OTP;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Exception;

class OTPResetServiceImpl implements OTPResetService
{
    public function sendOTP(string $email)
    {
        $user = User::where('email', $email)->first();
        if (!$user) {
            throw new Exception(__('validation.message.email_not_found'));
        }

        // Generate 6-digit OTP
        $otp = mt_rand(100000, 999999);
        $user->otp_code = $otp;
        $user->otp_expires_at = Carbon::now()->addMinutes(10); // OTP valid for 10 minutes
        $user->save();

        // Kirim email dengan OTP
        Mail::send('emails.otp', ['otp' => $otp], function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Your Password Reset OTP');
        });

        return __('validation.message.otp_sent');
    }

    public function verifyOTP(string $email, string $otp)
    {
        $user = User::where('email', $email)->first();
        if (!$user || $user->otp_code !== $otp || Carbon::now()->greaterThan($user->otp_expires_at)) {
            throw new Exception(__('validation.message.invalid_otp'));
        }

        // OTP valid, reset fields
        $user->otp_code = null;
        $user->otp_expires_at = null;
        $user->save();

        return true;
    }

    public function resetPassword(string $email, string $newPassword)
    {
        $user = User::where('email', $email)->first();
        if (!$user) {
            throw new Exception(__('validation.message.email_not_found'));
        }

        $user->password = Hash::make($newPassword);
        $user->save();

        return __('validation.message.password_reset_success');
    }
}
