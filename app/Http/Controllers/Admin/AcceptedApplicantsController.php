<?php

namespace App\Http\Controllers;
use App\Models\ApplicationForm;
use App\Models\InterviewSchedule;

class AcceptedApplicantsController extends Controller
{
public function index()
{
    $applications = ApplicationForm::with('schedule')->where('status', 'Accepted')->get();
    return view('admin.accepted_applicants.index', compact('schedules'));
}
}