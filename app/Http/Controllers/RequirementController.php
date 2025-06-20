<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Requirement;
use App\Models\ApplicationForm;

class RequirementController extends Controller
{
    // Admin or user can view this
    public function show($id = null)
    {
        // If $id is provided, assume admin access
        if ($id) {
            $application = ApplicationForm::findOrFail($id);
        } else {
            // Logged-in user access
            $application = ApplicationForm::where('user_id', Auth::id())->firstOrFail();
        }

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
            $path = $file->storeAs('public/requirements', $filename);

            // Save or update Requirement record for the logged-in user
            $requirement = Requirement::firstOrNew(['user_id' => Auth::id()]);
            $requirement->$field = $filename;
            $requirement->save();

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
