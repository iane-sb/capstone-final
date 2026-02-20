<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureStaff
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            return redirect()->route('staff.login');
        }

        $user = Auth::user();

        if (! $user->staff || ! $user->staff->is_active) {
            abort(403, 'Unauthorized: staff access only.');
        }

        return $next($request);
    }
}

