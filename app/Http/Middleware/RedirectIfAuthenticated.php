<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();
                
                // Role-based redirection
                if ($user->role == 2) {
                    // Admin
                    return redirect()->route('admin.applications');
                } elseif ($user->role == 3) {
                    // Assessor
                    return redirect()->route('assessor.dashboard');
                } elseif ($user->role == 4) {
                    // Department Coordinator
                    return redirect()->route('department.dashboard');
                } elseif ($user->role == 5) {
                    // College Coordinator
                    return redirect()->route('college.dashboard');
                }
                
                // Default user redirect
                return redirect()->route('homepage');
            }
        }

        return $next($request);
    }
}
