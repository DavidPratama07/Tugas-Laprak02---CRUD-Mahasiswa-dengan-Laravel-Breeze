<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // dd($role);

        if (auth()->user()->role != $role) {
            abort(403);
        }

        return $next($request);
    }
}