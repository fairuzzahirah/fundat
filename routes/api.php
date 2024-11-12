<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\RegisterController;


Route::middleware(['api'])->group(function () {
    Route::post('login', [LoginController::class, 'login']);
    // Endpoint untuk registrasi Organizer
    Route::post('/register-organizer', [RegisterController::class, 'organizerRegister'])->name('api.register-organizer');
    Route::post('/organization-enrollment/{user_id}', [OrganizationController::class, 'store'])->name('api.organization-enrollment');
    // Endpoint untuk registrasi Entrepreneur
    Route::post('/register-entrepreneur', [RegisterController::class, 'entrepreneurRegister'])->name('api.register-entrepreneur');
    Route::post('/mitra-enrollment/{user_id}', [MitraController::class, 'store'])->name('api.mitra-enrollment');
    
    Route::post('logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');
    Route::middleware('auth:sanctum')->get('/', function(){
        return response()->json(['message' => 'API is working']);
    });
});
