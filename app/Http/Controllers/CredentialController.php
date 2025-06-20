<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CredentialController extends Controller
{
    public function show($userId)
{
    $user = User::with('applicationForm')->findOrFail($userId);

    $credentials = [
        'original_school_credentials' => $user->original_school_credentials,
        'certificate_of_employment' => $user->certificate_of_employment,
        'nbi_barangay_clearance' => $user->nbi_barangay_clearance,
        'recommendation_letter' => $user->recommendation_letter,
        'proficiency_certificate' => $user->proficiency_certificate,
    ];

    return view('credentials.view', compact('user', 'credentials'));
}
}
