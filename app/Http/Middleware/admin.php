<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class admin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        } elseif (Auth::check() && Auth::user()->role == 'saleadmin') {
            return redirect('/index.php');
        } elseif (Auth::check() && Auth::user()->role == 'supervisor') {
            return redirect('/index.php');
        } else {
            return redirect('/index.php');
        }
    }

}
