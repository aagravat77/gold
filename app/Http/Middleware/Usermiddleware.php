<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Usermiddleware
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
        if (Auth::check() && auth()->user()->status == 'Deactive') 
        {
            Auth::logout();
            $request->session()->invalidate();

            $request->session()->regenerateToken();
            return redirect()->route('login')->with('error', 'You are unable to access this page for active your account contact admin');
            // return redirect('login');
        } else {
            return $next($request);
            
        }
        return $next($request);
    }
}
