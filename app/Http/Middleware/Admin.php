<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use const http\Client\Curl\AUTH_DIGEST;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::check()){

            if (Auth::user()->isAdmin()){

                return $next($request);
            }

            return " Your Not Admin ";
        }

        return  " Your Not log in ";

        return $next($request);
    }
}
