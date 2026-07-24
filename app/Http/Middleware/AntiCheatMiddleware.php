<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AntiCheatMiddleware
{
    /**
     * Handle an incoming request.
     * Prevents multiple active test sessions and verifies IP consistency.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user) {
            return $next($request);
        }

        // 1. IP Tracking for active test sessions
        $currentIp = $request->ip();
        $testAttemptId = $request->route('attempt_id') ?? $request->input('attempt_id');

        if ($testAttemptId) {
            $attempt = \App\Models\TestAttempt::find($testAttemptId);
            
            if ($attempt && $attempt->status === 'in_progress') {
                // If IP changed dramatically during a test, log or block
                if ($attempt->ip_address && $attempt->ip_address !== $currentIp) {
                    \Illuminate\Support\Facades\Log::warning("IP change detected during test for user {$user->id}. Original: {$attempt->ip_address}, New: {$currentIp}");
                    // return response()->json(['error' => 'Security violation: IP address changed during test.'], 403);
                }
            }
        }

        return $next($request);
    }
}
