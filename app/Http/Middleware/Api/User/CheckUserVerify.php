<?php

namespace App\Http\Middleware\Api\User;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function response;
use function trans;

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
            ], 401);

        return $next($request);
    }
}
