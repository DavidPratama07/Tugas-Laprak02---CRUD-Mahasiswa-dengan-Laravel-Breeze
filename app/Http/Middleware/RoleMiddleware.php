<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Pemakaian di route:
     *   ->middleware('role:admin')
     *   ->middleware('role:user')
     *   ->middleware('role:admin,user')
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // 1. Kalau user belum login → redirect ke halaman login
        if (!$request->user()) {
            return redirect()->route('login');
        }

        // 2. Kalau role user tidak termasuk yang diizinkan → tampilkan 403 Forbidden
        if (!in_array($request->user()->role, $roles)) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        // 3. Kalau role cocok → lanjutkan ke halaman tujuan
        return $next($request);
    }
}