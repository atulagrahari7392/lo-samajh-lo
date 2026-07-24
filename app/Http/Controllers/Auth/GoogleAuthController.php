<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                    'password' => bcrypt(Str::random(16)), // random password for google users
                    'role' => 'student',
                    'email_verified_at' => now(),
                    'referral_code' => Str::random(8),
                    'is_active' => true,
                ]);
                
                $user->profile()->create([
                    'full_name' => $googleUser->getName(),
                ]);
            } else {
                $user->update([
                    'google_id' => $googleUser->getId(),
                    'avatar' => $user->avatar ?? $googleUser->getAvatar()
                ]);
            }

            Auth::login($user, true);

            // If API request, redirect to frontend with token
            if (request()->wantsJson() || request()->is('api/*')) {
                $token = $user->createToken('auth_token')->plainTextToken;
                return redirect(config('app.frontend_url') . '/auth/callback?token=' . $token);
            }

            return redirect()->intended('/dashboard');

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Google Auth Error: ' . $e->getMessage());
            return redirect('/login')->with('error', 'Authentication failed, please try again.');
        }
    }
}
