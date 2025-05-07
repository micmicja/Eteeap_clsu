<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationForm;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationRejected;
use App\Models\User;

class CollegeCoordinatorController extends Controller
{
    public function index()
    {
    $applications = ApplicationForm::where('status', 'Accepted by Department Coordinator')->get();
    return view('admin.college_coordinator.dashboard', compact('applications'));
    }

    public function view($id)
    {
        $application = ApplicationForm::findOrFail($id);
        return view('admin.college_coordinator.application_view', compact('application'));
    }
    
    public function accept($id)
    {
        $application = ApplicationForm::findOrFail($id);
        $application->status = 'Accepted by College Coordinator'; // Final stage
        $application->save();

        return back()->with('success', 'Application is now in the Final Admission List.');
    }

    public function reject($id)
    {
        $application = ApplicationForm::findOrFail($id);
        $application->status = 'Rejected by College Coordinator';
        $application->save();
    
  
        $user = User::where('id', $application->user_id)->first();
        if ($user) {
            Mail::to($user->email)->send(new ApplicationRejected($application));
        }
    
        return back()->with('error', 'Application has been rejected and the applicant has been notified.');
    }
}
