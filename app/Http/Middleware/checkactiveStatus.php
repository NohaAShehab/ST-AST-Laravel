<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkactiveStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->active){
            return $next($request);  # available
        }

        return  response()->json("You need to activate your account");


    }
}
