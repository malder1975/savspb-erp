<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $level)
    {
        if (!$request->user()->hasLevel($level)) {
            return response()->json(['error' => 'Нет прав доступа.'], 401);
        }
        return $next($request);
    }
}
