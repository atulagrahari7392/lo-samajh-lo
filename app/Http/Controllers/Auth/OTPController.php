<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class OTPController extends Controller
{
    /**
     * Send OTP via MSG91
     */
    public function sendOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|numeric|digits:10'
        ]);

        $phone = $request->phone;
        
        // Ensure user exists if this is for login only. 
        // For registration, we might create user later.
        $user = User::firstOrCreate(
            ['phone' => $phone],
            ['name' => 'User', 'role' => 'student']
        );

        $otp = rand(100000, 999999);
        
        // Cache OTP for 5 minutes
        Cache::put('otp_' . $phone, $otp, now()->addMinutes(5));

        // Send via MSG91 (using Auth Key)
        $authKey = config('services.msg91.auth_key');
        $templateId = config('services.msg91.template_id');

        if ($authKey && $templateId) {
            Http::post("https://api.msg91.com/api/v5/otp?template_id={$templateId}&mobile=91{$phone}&authkey={$authKey}&otp={$otp}");
        } else {
            // Log it in local dev
            \Illuminate\Support\Facades\Log::info("OTP for $phone is $otp");
        }

        return response()->json([
            'success' => true,
            'message' => 'OTP sent successfully.'
        ]);
    }

    /**
     * Verify OTP
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|numeric|digits:10',
            'otp' => 'required|numeric|digits:6'
        ]);

        $phone = $request->phone;
        $cachedOtp = Cache::get('otp_' . $phone);

        if ($cachedOtp && $cachedOtp == $request->otp) {
            $user = User::where('phone', $phone)->first();
            
            if (!$user) {
                return response()->json(['error' => 'User not found.'], 404);
            }
            
            $user->update(['phone_verified_at' => now()]);
            
            // Generate Sanctum token for API or login for web session
            if ($request->wantsJson()) {
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json([
                    'success' => true,
                    'token' => $token,
                    'user' => $user
                ]);
            } else {
                Auth::login($user);
                return redirect()->intended('/dashboard');
            }
            
            Cache::forget('otp_' . $phone);
        }

        return response()->json([
            'success' => false,
            'error' => 'Invalid or expired OTP.'
        ], 400);
    }
}
