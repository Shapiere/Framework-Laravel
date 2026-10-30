<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Batasi akses route berdasarkan peran pengguna.
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (! $request->user() || $request->user()->role !== $role) {
            return response()->json([
                'success' => false,
                'message' => 'Anda tidak memiliki akses untuk peran '.$role,
            ], 403);
        }

        return $next($request);
    }
}
