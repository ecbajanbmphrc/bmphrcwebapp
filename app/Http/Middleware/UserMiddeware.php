<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            return redirect('/');
        }
            
            $user = Auth::user();
            if($user->role=="User"){
            return $next($request);
            }

            if($user->role=="Super Admin"){
                return redirect('/admin');
            }
    
            if($user->role=="Payroll Head"){
                return redirect('/payrollhead');
            }
    
            if($user->role=="Account Supervisor"){
                return redirect('/accountsupervisor');
            }
    
            if($user->role=="Payroll Officer"){
                return redirect('/payrollofficer');
            }
    
    }
}
