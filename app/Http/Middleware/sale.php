<?php

namespace App\Http\Middleware;

use Auth;
use Closure;


class sale {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Auth::check() && Auth::user()->role == 'sale') {
            return redirect('/index.php');
        } elseif (Auth::check() && Auth::user()->role == 'admin') {
            return redirect('/admin');
        } elseif (Auth::check() && Auth::user()->role == 'supervisor') {
            return redirect('/index.php');
        } else {
            return redirect('/index.php');
        }
    }

}
