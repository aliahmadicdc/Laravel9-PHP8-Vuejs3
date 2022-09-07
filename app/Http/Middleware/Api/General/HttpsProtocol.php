<?php

namespace App\Http\Middleware\Api\General;

use Closure;
use Illuminate\Http\Request;
use function config;
use function redirect;

class HttpsProtocol
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
        if (!config('app.debug'))
            if (!$request->secure()) {
                return redirect()->secure($request->getRequestUri());
            }

        return $next($request);
    }
}
