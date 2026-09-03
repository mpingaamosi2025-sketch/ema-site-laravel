<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::check()) {
            return redirect()->route('admin.login');
        }

        if (! (Auth::user()->is_admin ?? false)) {
            abort(403, 'Access denied.');
        }

        return $next($request);
    }
}
