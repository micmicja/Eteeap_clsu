<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationForm;

class AcceptedApplicantsController extends Controller
{
    public function index()
    {
        
        $applications = ApplicationForm::where('status', 'Accepted by College Coordinator')->get();
        return view('admin.accepted_applicants.index', compact('applications'));
    }
}