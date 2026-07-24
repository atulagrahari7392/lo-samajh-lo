<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'referral_code' => 'nullable|string|exists:users,referral_code',
        ]);

        $referredBy = null;
        if ($request->referral_code) {
            $referrer = User::where('referral_code', $request->referral_code)->first();
            $referredBy = $referrer ? $referrer->id : null;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'student',
            'referral_code' => Str::random(8),
            'referred_by' => $referredBy,
            'is_active' => true,
        ]);

        // Generate profile
        $user->profile()->create([
            'full_name' => $request->name,
        ]);

        if ($referredBy) {
            \App\Models\Referral::create([
                'referrer_id' => $referredBy,
                'referred_id' => $user->id,
                'status' => 'pending'
            ]);
        }

        Auth::login($user);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'token' => $user->createToken('auth_token')->plainTextToken,
                'user' => $user
            ], 201);
        }

        return redirect('/dashboard');
    }
}
