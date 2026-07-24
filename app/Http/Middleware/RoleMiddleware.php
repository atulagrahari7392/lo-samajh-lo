<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!$request->user()) {
            return redirect()->route('login');
        }

        $userRole = $request->user()->role ?? 'student';

        foreach ($roles as $role) {
            if ($userRole === $role) {
                return $next($request);
            }
        }

        // Redirect to appropriate dashboard based on role
        if ($userRole === 'admin') {
            return redirect()->route('admin.dashboard')->with('error', 'Access denied to that section.');
        } elseif ($userRole === 'teacher') {
            return redirect()->route('teacher.dashboard')->with('error', 'Access denied to that section.');
        } else {
            return redirect()->route('student.dashboard')->with('error', 'Access denied to that section.');
        }
    }
}
