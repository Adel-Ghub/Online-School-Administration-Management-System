<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Logging\Log;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Illuminate\Support\Facades\Auth;



class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
/*     public function handle($request, Closure $next)
    {
        Log::user()->info('User logged in');
        return $next($request);
    }
     */
/* 
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('user')->check()) {
            return $next($request);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    } */
    public function handle($request, Closure $next)
    {
        
        $token = $request->header('Authorization');
        if(!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    
        return $next($request);
    }
    
    
}
