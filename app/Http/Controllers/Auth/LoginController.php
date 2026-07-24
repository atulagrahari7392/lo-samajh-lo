<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Support both email/password and phone/OTP
        $request->validate([
            'login' => 'required|string', // can be email or phone
            'password' => 'required_without:otp|string',
            'otp' => 'required_without:password|string'
        ]);

        $this->ensureIsNotRateLimited($request);

        $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        if ($request->filled('password')) {
            if (Auth::attempt([$fieldType => $request->login, 'password' => $request->password], $request->boolean('remember'))) {
                RateLimiter::clear($this->throttleKey($request));
                $request->session()->regenerate();
                
                $user = Auth::user();
                // Safely update last login (ip_address may not exist in all setups)
                try { $user->update(['last_login_at' => now()]); } catch (\Exception $e) {}

                if ($request->wantsJson()) {
                    return response()->json([
                        'success' => true,
                        'token' => $user->createToken('auth_token')->plainTextToken,
                        'user' => $user
                    ]);
                }

                return redirect()->intended($this->redirectTo($user));
            }
        } elseif ($request->filled('otp')) {
            // OTP logic handled by OTPController, but we could do it here
            // Just verifying cache...
            $cachedOtp = \Illuminate\Support\Facades\Cache::get('otp_' . $request->login);
            if ($cachedOtp && $cachedOtp == $request->otp) {
                $user = \App\Models\User::where($fieldType, $request->login)->first();
                if ($user) {
                    Auth::login($user, $request->boolean('remember'));
                    RateLimiter::clear($this->throttleKey($request));
                    $request->session()->regenerate();
                    
                    \Illuminate\Support\Facades\Cache::forget('otp_' . $request->login);

                    if ($request->wantsJson()) {
                        return response()->json([
                            'success' => true,
                            'token' => $user->createToken('auth_token')->plainTextToken,
                            'user' => $user
                        ]);
                    }
                    return redirect()->intended($this->redirectTo($user));
                }
            }
        }

        RateLimiter::hit($this->throttleKey($request));

        throw ValidationException::withMessages([
            'login' => [trans('auth.failed')],
        ]);
    }

    /**
     * Redirect based on user role after login.
     */
    protected function redirectTo($user): string
    {
        if ($user->role === 'admin') {
            return '/admin/dashboard';
        } elseif ($user->role === 'teacher') {
            return '/teacher/dashboard';
        }
        return '/student/dashboard';
    }

    public function logout(Request $request)
    {
        // Only delete sanctum token if using API (not web session)
        try {
            if ($request->user() && method_exists($request->user()->currentAccessToken(), 'delete')) {
                $request->user()->currentAccessToken()->delete();
            }
        } catch (\Exception $e) {}
        
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Logged out']);
        }

        return redirect('/');
    }

    protected function ensureIsNotRateLimited(Request $request): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey($request), 5)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey($request));

        throw ValidationException::withMessages([
            'login' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    protected function throttleKey(Request $request): string
    {
        return Str::transliterate(Str::lower($request->input('login')).'|'.$request->ip());
    }
}
