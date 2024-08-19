<?php
namespace App\Http\Middleware;

use Closure;

class DisableCsrfProtection
{
    public function handle($request, Closure $next)
    {
        if ($request->is('test-csrf')) {
            \Illuminate\Support\Facades\URL::macro('isValid', function ($url) {
                return true;
            });
        }
        return $next($request);
    }
}
