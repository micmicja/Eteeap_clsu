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
        $requirement = \App\Models\Requirement::where('user_id', $application->user_id)->first();
        return view('admin.department_coordinator.application_view', compact('application', 'requirement'));
    }

    public function accept($id)
    {
        $application = ApplicationForm::findOrFail($id);
        $application->status = 'Accepted by Department Coordinator';
        $application->save();

        return back()->with('success', 'Application has been accepted and forwarded to the College Coordinator.');
    }

public function reject(Request $request, $id)
{
    // ✅ Validate remarks input
    $request->validate([
        'remarks' => 'required|string|max:1000',
    ]);

    // ✅ Update the application with remarks and rejection status
    $application = ApplicationForm::findOrFail($id);
    $application->status = 'Rejected by Department Coordinator';
    $application->remarks = $request->remarks;
    $application->save();

    // ✅ Get user and send rejection email
    $user = User::find($application->user_id);
    if ($user && $user->email) {
        Mail::to($user->email)->send(new ApplicationRejected($application));
    }

    return back()->with('error', 'Application has been rejected and the applicant has been notified.');
}
}
