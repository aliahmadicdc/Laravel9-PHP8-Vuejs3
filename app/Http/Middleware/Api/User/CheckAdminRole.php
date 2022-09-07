<?php

namespace App\Http\Middleware\Api\User;

use Closure;
use Illuminate\Http\Request;
use function abort;
use function auth;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->isAdmin())
            return $next($request);

        abort(401);
    }
}
