<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Gate::authorize('manage-posts');

        return $next($request);
    }
// if (Auth::check() && Auth::user()->role === 'admin') {
//         return $next($request);
//     }
//     abort(403);
//     }
}
