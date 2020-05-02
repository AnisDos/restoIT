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

        
            if (Auth::user()->admin()->exists()) {
                return redirect ('admin'); 
                
    
            } elseif (Auth::user()->restaurant()->exists()) {
                
                return redirect ('restaurant'); 

            }elseif (Auth::user()->employee()->exists()) {
    
                return redirect ('employee'); 
    
            }elseif (Auth::user()->superadmin()->exists()) {
    
                return redirect ('superadmin'); 
    
            }
            return redirect ('erreur'); 


        }



        return $next($request);
    }
}
