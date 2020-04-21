<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class Employee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null )
    {

        switch ($guard) {
         
            case 'employee':
                if (Auth::guard($guard)->check()) {
                    
        dd('jjhjhj',Auth::user(),auth()->guest(),auth());
                    return redirect ('employee'); 
                }
                break;
            
            default:
                if (Auth::guard($guard)->check()) {
                      if (Auth::user()->is_admin) {
                            return redirect ('admin'); /* $redirectTo = RouteServiceProvider::ADMIN;*/
                      }
                      return redirect ('restaurant'); /*$redirectTo = RouteServiceProvider::HOME;*/
        
                /*return redirect(RouteServiceProvider::HOME);*/
                }
                break;
        }




        return $next($request);
    }
}
