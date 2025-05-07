<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationForm;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationRejected;
use App\Models\User;

class DepartmentCoordinatorController extends Controller
{
    public function index()
    {
    $applications = ApplicationForm::where('status', 'Accepted by Assessor')->get();
    return view('admin.department_coordinator.dashboard', compact('applications'));
    } 

    public function view($id)
    {
        $application = ApplicationForm::findOrFail($id);
        return view('admin.department_coordinator.application_view', compact('application'));
    }

    public function accept($id)
    {
        $application = ApplicationForm::findOrFail($id);
        $application->status = 'Accepted by Department Coordinator';
        $application->save();

        return back()->with('success', 'Application has been accepted and forwarded to the College Coordinator.');
    }

    public function reject($id)
{
    $application = ApplicationForm::findOrFail($id);
    $application->status = 'Rejected by Department Coordinator';
    $application->save();

 
    $user = User::where('id', $application->user_id)->first();
    if ($user) {
        Mail::to($user->email)->send(new ApplicationRejected($application));
    }

    return back()->with('error', 'Application has been rejected and the applicant has been notified.');
}
}
