<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Group routes with middleware
Route::middleware(['api'])->group(function () {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [RegisterController::class, 'register']);
    Route::post('logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');
    Route::middleware('auth:sanctum')->get('/', function(){
        return response()->json(['message' => 'API is working']);
    });
});
