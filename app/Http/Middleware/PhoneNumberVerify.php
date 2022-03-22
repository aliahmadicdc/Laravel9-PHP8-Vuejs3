<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PhoneNumberVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->phone_number_verified_at!= null && auth()->user()->phone_number_verified_at!='')
            return $next($request);

        return redirect()->route('panel.verify');
    }
}
