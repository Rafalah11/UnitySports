<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if(auth()->User()->role == $role){
            return $next($request);
        }
        if(Auth::User()->role == 'ADMIN'){
            return redirect()->intended('landingpageadmin');
        }else {
            return redirect()->intended('landingpageafterlogin');
        }
    }
}
