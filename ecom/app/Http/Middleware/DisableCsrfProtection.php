<?php

namespace App\Http\Middleware;

use Closure;

class DisableCsrfProtection
{
    public function handle($request, Closure $next)
    {
        // Disable CSRF protection
        app('Illuminate\Foundation\Http\Middleware\VerifyCsrfToken')->except($request->path());

        return $next($request);
    }
}
