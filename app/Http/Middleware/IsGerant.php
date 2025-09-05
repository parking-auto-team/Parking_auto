<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsGerant
{
    public function handle($request, Closure $next)
    {
        if (session('type') === 'gerant') {
            return $next($request);
        }
        return redirect()->route('login')->with('title', 'Accès refusé.');
    }
}
