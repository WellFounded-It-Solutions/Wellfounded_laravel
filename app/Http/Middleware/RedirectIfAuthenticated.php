<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

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
        
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->role ==1 ){
                return redirect()->intended('/admin/dashboard');
            }else if(Auth::user()->role ==2){
                return redirect()->intended('/agency/dashboard');
            }else if(Auth::user()->role ==3){
                return redirect()->intended('/developer/dashboard');
            }else if(Auth::user()->role ==4){
                return redirect()->intended('/clients/dashboard');
            }
        }

        return $next($request);
    }
}
