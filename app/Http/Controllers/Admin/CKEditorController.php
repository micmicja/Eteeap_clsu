<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        // Check if a file is being uploaded
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            
            // Check if the file is valid
            if ($file->isValid()) {
                try {
                    // Get original file details
                    $originalName = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $fileName = pathinfo($originalName, PATHINFO_FILENAME) . '_' . time() . '.' . $extension;
                    
                    // Define the directory to save the file
                    $filePath = $file->move(public_path('upload/category'), $fileName);

                    // Get the URL of the uploaded file
                    $url = asset('upload/category/' . $fileName);

                    // Return the response with file URL
                    return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
                } catch (\Exception $e) {
                    // Catch any errors during file upload and log them
                    Log::error('File upload failed: ' . $e->getMessage());
                    return back()->withErrors(['image' => 'File upload failed. Please try again.']);
                }
            }
        }

        return back()->withErrors(['image' => 'No file uploaded.']);
    }
}
