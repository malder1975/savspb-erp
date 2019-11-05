<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckIsAdmin
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
        if (JWTauth::check() && JWTAuth::user()->LEVELS_ID === 100) {
            //return console.log(JWTAuth::user()->LEVELS_ID);
            return $next($request);
        } else {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    }
}
