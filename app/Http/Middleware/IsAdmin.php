<?php

namespace App\Http\Middleware;

use Closure;
use Auth ;
class IsAdmin
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
        if (Auth::user()) {
            
            return $next($request);
        }
        Auth::logout();
        return redirect('login')->with('message','You have not admin access');
    }
}