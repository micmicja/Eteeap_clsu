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

    
    public function store(LoginRequest $request)
    {
      
        $request->authenticate();
       
        $request->session()->regenerate();

        
        $user = Auth::user();

       
        if ($user->role == 2) {
          
            return redirect()->route('admin.applications'); 
        } elseif ($user->role == 3) {
           
            return redirect()->route('assessor.dashboard');
        } elseif ($user->role == 4) {
          
            return redirect()->route('department.dashboard');
        } elseif ($user->role == 5) {
           
            return redirect()->route('college.dashboard');
        }

       
        return redirect()->route('homepage'); 
    }

    
    public function destroy(Request $request): RedirectResponse
    {
       
        Auth::guard('web')->logout();
        
      
        $request->session()->invalidate();
        
      
        $request->session()->regenerateToken();

     
        return redirect('/')->with('success', 'You have been logged out successfully!');
    }


    protected function redirectTo()
    {
    
        return '/admin/home';
    }
}
