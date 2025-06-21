<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if (!in_array($user->role, $roles)) {
            return redirect()->route('userpanel')->with('error', 'Kamu tidak punya akses.');

        }

        return $next($request);
    }
}
// This middleware checks if the authenticated user has one of the specified roles.
// If not, it redirects them to the dashboard with an error message.
// It also ensures that the user is authenticated before checking their role.
// Usage in routes:
