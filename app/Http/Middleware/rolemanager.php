<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class rolemanager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $authUserRole = Auth::user()->usertype;

        if ($role === 'admin' && $authUserRole == 1) {
            return $next($request);
        }

        if ($role === 'user' && $authUserRole == 0) {
            return $next($request);
        }

        
        if ($authUserRole == 1) {
            return redirect()->route('admin.dashboard');
        }
       
         return redirect()->route('home.index');
         }


}
