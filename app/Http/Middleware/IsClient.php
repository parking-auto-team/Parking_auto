<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsClient
{
    public function handle($request, Closure $next)
    {
        if (session('type') === 'client') {
            return $next($request);
        }
        return redirect()->route('login')->with('title', 'Accès refusé.');
    }
}
