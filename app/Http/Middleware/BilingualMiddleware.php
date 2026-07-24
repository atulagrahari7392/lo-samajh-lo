<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BilingualMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('lang')) {
            App::setLocale($request->get('lang'));
        }
        return $next($request);
    }
}
