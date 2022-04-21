<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
    public function register(Request $request) 
    {
        $validateData = $request->validate([
            "name"      => 'required|string|max:255',
            "email"     => 'required|string|email|max:255|unique:users',
            "password"  => 'required|string|min:8'
        ]);

        $user = User::create([
            "name"      => $validateData['name'],
            "email"     => $validateData['email'],
            "password"  => Hash::make($validateData['password']),
            "role_id"   => Role::ROLE_BASIC
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->_tokenResponse($token);
    }

    public function login(Request $request) 
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => "Invalid login credentials"
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->_tokenResponse($token); 
    }

    public function user(Request $request) 
    {
        return $request->user();
    }

    protected function _tokenResponse(string $token)
    {
        return response()->json([
            "access_token"  => $token,
            "token_type"    => 'Bearer'
        ], 200);
    }
}