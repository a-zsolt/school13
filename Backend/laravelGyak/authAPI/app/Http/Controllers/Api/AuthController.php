<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Nette\Schema\ValidationException;


class AuthController extends Controller
{
    public function register(Request $request){
        $validated  = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'nullable|string|in:user,manager,admin',
        ]);

        $user = User::create([
            "name" => $validated["name"],
            "email" => $validated["email"],
            "password" => Hash::make($validated["password"]),
            "role" => $validated["role"] ?? 'user',
        ]);
        return response()->json([
            "success" => true,
            "message" => "User created successfully",
            "user" => $user
        ], 201);
    }
    public function login(Request $request){
        $validated  = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if(!Auth::attempt($validated)){
            throw ValidationException::withMessage([
                'email' => 'The provided credentials are incorrect.'
            ]);
        }

        $user = Auth::user();

        $abilities = ['user'];
        if ($user->role == 'admin') {
            $abilities = ['user', 'manager',  'admin'];
        } else if ($user->role == 'manager'){
            $abilities = ['user', 'manager'];
        }

        $token = $user->createToken('auth_token', $abilities)->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'User logged in successfully',
            'access_token' => $token,
            'abilities' => $abilities,
        ]);
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'User logged out successfully'
        ]);
    }
    public function me(Request $request){
        return response()->json([
            'success' => true,
            'user' => $request->user()
        ], 200);
    }
}
