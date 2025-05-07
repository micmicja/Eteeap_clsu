<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationForm;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationRejected;
use App\Models\User;

class AssessorController extends Controller
{
    public function view($id)
    {
    $application = ApplicationForm::findOrFail($id);
    return view('admin.assessor.application_view', compact('application'));
    }


    public function index()
    {
    $applications = ApplicationForm::where('status', 'Accepted by Arlene')->get();
    return view('admin.assessor.dashboard', compact('applications'));
    }

    public function accept($id)
    {
        $application = ApplicationForm::findOrFail($id);
        $application->status = 'Accepted by Assessor';
        $application->save();

        return back()->with('success', 'Application has been accepted and forwarded to the Department Coordinator.');
    }
    public function reject($id)
    {
        $application = ApplicationForm::findOrFail($id);
        $application->status = 'Rejected by Assessor';
        $application->save();
    
      
        $user = User::where('id', $application->user_id)->first();
        if ($user) {
            Mail::to($user->email)->send(new ApplicationRejected($application));
        }
    
        return back()->with('error', 'Application has been rejected and the applicant has been notified.');
    }
}
