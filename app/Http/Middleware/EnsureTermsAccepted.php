<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTermsAccepted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
     //   if (!session()->has('accepted_terms')) {
            // Store where user wanted to go
          //  session(['intended_url' => url()->full()]);
         //   return redirect()->route('terms.show');
      //  }

      //  return $next($request);
    }
}
