<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
        echo 'a' ; die ; 
        if (Auth::user() &&  Auth::user()->type == 'admin') {
             return $next($request);
        }

        return redirect('home')->with('error','You have not admin access');
    }
}