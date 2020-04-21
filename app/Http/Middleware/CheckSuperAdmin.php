<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class CheckSuperAdmin
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
        if (Auth::user()) {
            if (Auth::user()->is_admin) {
                if (Auth::user()->superAdmin->is_super_admin) {
                    
                return $next($request);
                }else{
                    return redirect('admin');
                }
            }
            return redirect('restaurant');
        }
        return redirect('/');
    }
}
