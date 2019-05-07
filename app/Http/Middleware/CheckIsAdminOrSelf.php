<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckIsAdminOrSelf
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
        $requestedUserId = $request->route()->parameter('PERSONAL_ID');

        if (JWTAuth::user()->LEVELS_ID === 100 || JWTAuth::user()->id == $requestedUserId) {
            return $next($request);
        } else {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    }
}
