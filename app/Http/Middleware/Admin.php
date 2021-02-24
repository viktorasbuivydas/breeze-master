<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class Admin
{
    public function handle($request, Closure $next) {
        if (Auth::user() !== null) {
            if(auth()->user()->is_admin)
                return $next($request);
            return redirect('/dashboard');
        }
        else{
            return redirect('/login');
        }
    }
}
