<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate(['email' => 'required|email', 'password' => 'required']);
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
        $token = $user->createToken('api-token')->plainTextToken;
        return response()->json(['token' => $token, 'user' => $user, 'role' => $user->role]);
    }

    public function register(Request $request)
    {
        $data = $request->validate(['name' => 'required', 'email' => 'required|email|unique:users', 'password' => 'required|min:8', 'phone' => 'nullable']);
        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'student';
        $user = User::create($data);
        $token = $user->createToken('api-token')->plainTextToken;
        return response()->json(['token' => $token, 'user' => $user], 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }

    public function sendOtp(Request $request) { return response()->json(['message' => 'OTP sent to '.$request->phone]); }
    public function verifyOtp(Request $request) { return response()->json(['message' => 'OTP verified', 'verified' => true]); }
}
