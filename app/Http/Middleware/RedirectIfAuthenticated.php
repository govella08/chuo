<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Entrust;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if(!Entrust::can($request->route()->getAction()['controller'])){
        //     abort(403, 'Unauthorized action.');
        // }
        if (Auth::guard($guard)->check()) {
            return redirect('/cms');
        }
        return $next($request);
    }
}
