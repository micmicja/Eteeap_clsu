<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class ApplicantController extends Controller
{
    // Update the degree for an applicant
    public function updateDegree(Request $request, $id)
{
    $request->validate([
        'degree_program' => 'required|string|max:255',
    ]);

    $application = Application::findOrFail($id);

    $application->degree_program = $request->degree_program;

    $application->save(); // ✅ Make sure this is called

    return response()->json(['message' => 'Degree updated for applicant ' . $id]);
}

}
