<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
       
        // Check if the authenticated user has one of the allowed roles
        if ($request->user() && in_array($request->user()->role, $roles)) {
            return $next($request);
        }

        // Redirect the user or abort the request as needed
        return redirect()->back()->withErrors(['message' => 'Unauthorized']);
        // or
        // abort(403, 'Unauthorized');
    }
}
