<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
   
    public function index()
    {
 
       $applications = ApplicationForm::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

       return view('user.index', compact('applications'));
    }
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

 
    public function update(Request $request)
    {
        $user = Auth::user();
    
  
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);
    
      
        $data = $request->only(['name', 'email']);
    
     
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
    
  
        try {
            $user->update($data);
            Session::flash('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            Session::flash('error', 'An error occurred while updating the profile.');
        }
    
        return redirect()->route('profile.edit');
    }
    public function create(Request $request)
{
    if (!$request->has('agree')) {
        return redirect()->route('terms')->with('error', 'You must agree to the terms and conditions before registering.');
    }

    return view('auth.register');
}
    }
    