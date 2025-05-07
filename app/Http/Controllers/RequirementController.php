<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Requirement;
use App\Models\ApplicationForm;
use Illuminate\Support\Facades\Log;

class RequirementController extends Controller
{
    public function show($id)
    {
        $application = ApplicationForm::findOrFail($id);
        $requirement = Requirement::where('user_id', $application->user_id)->first();

        return view('application.view', compact('application', 'requirement'));
    }
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'field' => 'required|string'
        ]);
    
        try {
            $field = $request->input('field');
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/uploads', $filename);
    

    
            return response()->json([
                'message' => 'Upload successful',
                'filename' => $filename,
                'path' => $path,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Upload failed: ' . $e->getMessage(),
            ], 500);
        }
    }
        
}
