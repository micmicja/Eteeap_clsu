<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationForm;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationRejected;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
  public function reject(Request $request, $id)
{
    // Validate the remarks input
    $request->validate([
        'remarks' => 'required|string|max:1000',
    ]);

    // Find and update the application
    $application = ApplicationForm::findOrFail($id);
    $application->remarks = $request->remarks;
    $application->status = 'Rejected by Assessor';
    $application->save();

    // Send rejection email
    $user = $application->user; // assuming there's a `user()` relationship
    if ($user && $user->email) {
        Mail::to($user->email)->send(new ApplicationRejected($application));
    }

    return back()->with('success', 'Application rejected and email sent.');
}

}
