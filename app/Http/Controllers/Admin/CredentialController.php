<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requirement;

class CredentialController extends Controller
{
    public function show($id)
    {
        $requirement = Requirement::where('user_id', $id)->firstOrFail();
        $user = $requirement->user;

        $credentials = [
            'original_school_credentials' => $requirement->original_school_credentials,
            'certificate_of_employment' => $requirement->certificate_of_employment,
            'nbi_barangay_clearance' => $requirement->nbi_barangay_clearance,
            'recommendation_letter' => $requirement->recommendation_letter,
            'proficiency_certificate' => $requirement->proficiency_certificate,
        ];

        return view('admin.credentials.view', compact('user', 'credentials'));
    }
}
