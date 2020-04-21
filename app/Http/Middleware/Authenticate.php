<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

   /*  public function handle($request, Closure $next , $guard = null)
    {   */ 
       
        /* if (auth()->guest()) {
          
            return redirect()->route('login');
        }else{

            if (!Auth::user()->verified) {
                return redirect ('notVerified'); 
            }
        } */

      //  dd('jjhjhj',Auth::user(),auth()->guest(),$guard);
   /*      if (auth()->guest()) {
          
        switch ($guard) {
            case 'employee':
               
                if (Auth::guard($guard)->check()) {
                   // dd('kh');
                   // return redirect ('employee');  
                }else{
            return redirect()->route('employee.login');
        }
                break;
            
            default:
              
            return redirect()->route('login');
                break;
        }
    }else {
        switch ($guard) {
            case 'employee':

           
                if (!Auth::user()->verified) {
                    return redirect ('notVerified'); 
                }

                
            return redirect()->route('login');

              
                break;
            
            default:
            if (!Auth::user()->verified) {
                return redirect ('notVerified'); 
            }
                break;
        }
       
    }

        return $next($request);
    } */
}
