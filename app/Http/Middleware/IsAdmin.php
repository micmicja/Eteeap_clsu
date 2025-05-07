<?php
// app/Http/Middleware/IsAdmin.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        
        if (auth()->user() && auth()->user()->usertype != 1) { 
            return redirect('home');
        }

        return $next($request);
    }
}
