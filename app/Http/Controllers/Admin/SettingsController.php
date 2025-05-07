<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\File;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'system_title' => 'required|string|max:255',
            'system_logo' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);
    
        // Update system title (storing it as value for system_title key)
       // Save domain setting
        Setting::updateOrCreate(
            ['key' => 'system_domain'],
            ['value' => $request->system_domain]
        );

    
        // Update system logo (storing the file path for system_logo key)
        if ($request->hasFile('system_logo')) {
            $file = $request->file('system_logo');
            $filename = 'logo.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/system/'), $filename);
    
            // Save logo path in the settings table
            Setting::updateOrCreate(
                ['key' => 'system_logo'], 
                ['value' => 'uploads/system/' . $filename]
            );
        }
    
        return redirect()->back()->with('success', 'Settings updated.');
    }
    
}
