<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Auth\OTPResetController;
use App\Http\Controllers\API\Entrepreneur\Mitra\MitraController;
use App\Http\Controllers\API\Organizer\Organization\OrganizationController;
use App\Http\Controllers\UserDataController;


Route::middleware(['api'])->group(function () {
    Route::post('login', [LoginController::class, 'login']);
    // Endpoint untuk registrasi Organizer
    Route::post('/register-organizer', [RegisterController::class, 'organizerRegister'])->name('api.register-organizer');
    Route::post('/organizer-form/{user_id}', [OrganizationController::class, 'store'])->name('api.organizer-form');
    // Endpoint untuk registrasi Entrepreneur
    Route::post('/register-entrepreneur', [RegisterController::class, 'entrepreneurRegister'])->name('api.register-entrepreneur');
    Route::post('/mitra-form/{user_id}', [MitraController::class, 'store'])->name('api.mitra-form');
    Route::put('/user-form/{user_id}', [UserDataController::class,'updateupdateUserData'])->name('api.user-form');
        
    Route::post('logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');
    Route::post('password/send-otp', [OTPResetController::class, 'sendOTP']);
    Route::post('password/verify-otp', [OTPResetController::class, 'verifyOTP']);
    Route::post('password/reset-with-otp', [OTPResetController::class, 'resetPassword']);
});
