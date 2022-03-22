<?php

namespace App\Http\Middleware\api;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserVerify
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
        $user = Auth::user();
        if (!$user->phone_number_verified_at)
            return response()->json([
                'result' => false,
                'message' => trans('messages.userDeActive'),
                'data' => null,
            ], 403);

        return $next($request);
    }
}
