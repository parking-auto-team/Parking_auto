<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (session('type') === 'admin') {
            return $next($request);
        }
        return redirect()->route('login')->with('title', 'Accès refusé.');
    }
}
