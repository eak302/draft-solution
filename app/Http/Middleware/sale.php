<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class sale
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
        
        if (Auth::check() && Auth::user()->role == 'sale') {
            return $next($request);
        }
        else {
            return redirect('/admin');
        }
        
        /*if (auth()->guest()) {
            return redirect()->route('login');
        } else if (Auth::check() && Auth::user()->role == 'sale') {
            return $next($request);
        } else if (Auth::check() && Auth::user()->role == 'admin') {
            return redirect('/admin');
        } else if (Auth::check() && Auth::user()->role == 'supervisor') {
            return redirect('/index');
        } else {
            return redirect('/index');
        }*/
    }

}
