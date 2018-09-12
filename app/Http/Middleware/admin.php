<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class admin
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
        if (auth()->guest()) {
            return redirect()->route('login');
        } else if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        } elseif (Auth::check() && Auth::user()->role == 'saleadmin') {
            return redirect('/index');
        } elseif (Auth::check() && Auth::user()->role == 'supervisor') {
            return redirect('/index');
        } else {
            return redirect('/index');
        }
    }

}
