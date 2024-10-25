<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $authService;

    public function __construct(Authservice $authService)
    {
        $this->authService = $authService;
    }

    public function login(Request $request)
    {
        try {
            return $this->authService->login($request);
        } catch (\Exception $exception) {
            return dd($exception->getMessage());
        }
    }

    public function logout(Request $request)
    {
        try {
            return new ApiResponse('success',  __('validation.message.logged_out'), $this->authService->logout($request), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }
}
