<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
 
    public function create(): View
    {
        return view('auth.login');
    }

    
    public function store(Request $request)
    {
        // Validate and authenticate the user
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

        // Regenerate session to prevent session fixation attacks
        $request->session()->regenerate();

        $user = Auth::user();

        // Clear any intended URL to prevent conflicts
        $request->session()->forget('url.intended');

        // Role-based redirection with explicit route redirection
        switch ($user->role) {
            case 2: // Admin
                return redirect()->intended(route('admin.applications'));
            case 3: // Assessor
                return redirect()->intended(route('assessor.dashboard'));
            case 4: // Department Coordinator
                return redirect()->intended(route('department.dashboard'));
            case 5: // College Coordinator
                return redirect()->intended(route('college.dashboard'));
            default: // Regular user
                return redirect()->intended(route('homepage'));
        }
    }

    
    public function destroy(Request $request): RedirectResponse
    {
        // Store user role before logout for potential redirect logic
        $userRole = Auth::user()->role ?? null;
        
        // Logout the user
        Auth::guard('web')->logout();
        
        // Invalidate the session to clear all session data
        $request->session()->invalidate();
        
        // Regenerate CSRF token to prevent CSRF attacks
        $request->session()->regenerateToken();
        
        // Clear any intended URL to prevent conflicts on next login
        $request->session()->forget('url.intended');

        // Redirect to home with success message
        return redirect('/')->with('success', 'You have been logged out successfully!');
    }


    protected function redirectTo()
    {
    
        return '/admin/home';
    }
}
