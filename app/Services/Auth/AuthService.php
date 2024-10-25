<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthService {
    public function login($request)
    {
        $user = User::where('email', $request->email)->first();
        
        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('YourAppName')->plainTextToken;
            return ['user' => $user, 'token' => $token];
        }
        
        throw new \Exception('Invalid email or password.', 401);
    }
    
    public function logout($request)
    {
        $request->user()->tokens()->delete();
        return 'Logged out successfully';
    }
}
