<?php

namespace App\Http\Middleware\api;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ForceJsonResponse
{
    public function handle(Request $request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');

        return $next($request);
    }
}
