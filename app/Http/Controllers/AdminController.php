<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationForm;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationRejected;
use App\Models\User;
use App\Models\InterviewSchedule;
use App\Exports\ApplicationsExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
  

    public function edit($id)
{
    
    $user = User::findOrFail($id);

    
    return view('admin.users.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'role' => 'required|integer|in:1,2,3,4,5',
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
    ]);

    return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
}






    
public function index(Request $request)
{
   
    $roleFilter = $request->input('role', 'all'); 
    $search = $request->input('search', ''); 

   
    $query = User::query();

    if ($roleFilter != 'all') {
     
        $query->where('role', $this->getRoleByFilter($roleFilter));
    }

    if ($search) {
  
        $query->where(function ($query) use ($search) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
        });
    }

    
    $users = $query->get();

    return view('admin.users.index', compact('users', 'roleFilter', 'search'));
}


private function getRoleByFilter($roleFilter)
{
    $roles = [
        'admin' => 1,
        'assessor' => 2,
        'department_coordinator' => 3,
        'college_coordinator' => 4,
        'applicant' => 5,
    ];

    return $roles[$roleFilter] ?? null; 
}


public function users()
{
    $users = \App\Models\User::all(); 

    return view('admin.users.index', compact('users'));
}


public function applications()
{
    $applications = ApplicationForm::all();

    $pendingApplications = $applications->where('status', 'Pending');

   
    $acceptedApplications = $applications->filter(function ($app) {
        return str_starts_with($app->status, 'Accepted by');
    });

    
    $rejectedApplications = $applications->filter(function ($app) {
        return str_starts_with($app->status, 'Rejected by');
    });

    return view('admin.applications', compact('pendingApplications', 'acceptedApplications', 'rejectedApplications'));
}



    public function view($id)
    {
        $application = ApplicationForm::findOrFail($id);
        $requirement = \App\Models\Requirement::where('user_id', $application->user_id)->first();
        return view('admin.application_view', compact('application', 'requirement'));
    }

    public function accept($id)
    {
        $application = ApplicationForm::findOrFail($id);
        $application->status = 'Accepted by Arlene';
        $application->save();

        return back()->with('success', 'Application has been accepted and forwarded to the Assessor.');
    }

   public function reject(Request $request, $id)
{
    // ✅ Validate remarks input
    $request->validate([
        'remarks' => 'required|string|max:1000',
    ]);

    // ✅ Find the application and user
    $application = ApplicationForm::findOrFail($id);
    $user = $application->user;

    if (!$user || !$user->email) {
        return back()->with('error', 'Applicant email not found.');
    }

    // ✅ Update status and remarks
    $application->status = 'Rejected by Admin';
    $application->remarks = $request->remarks;
    $application->save();

    // ✅ Send rejection email with remarks
    Mail::to($user->email)->send(new ApplicationRejected($application));

    return back()->with('success', 'Application has been rejected and the applicant has been notified.');
}

    public function unreject($id)
{
    $application = ApplicationForm::findOrFail($id);
    $application->status = 'Pending'; 
    $application->save();

    return back()->with('success', 'Application has been moved back to Pending.');
}
public function reschedule($id)
{
    $schedule = InterviewSchedule::findOrFail($id);
    return view('admin.accepted_applicants.reschedule', compact('schedule'));
}
public function adminHome()
{
    return view('admin.adminhome');  
}

public function exportExcel()
{
    return Excel::download(new ApplicationsExport, 'applications.xlsx');
}

public function exportAll()
{
    return Excel::download(new ApplicationsExport(), 'all_applications.xlsx');
}

public function exportPending()
{
    return Excel::download(new ApplicationsExport('pending'), 'pending_applications.xlsx');
}

public function exportAccepted()
{
    return Excel::download(new ApplicationsExport('accepted'), 'accepted_applications.xlsx');
}

public function exportRejected()
{
    return Excel::download(new ApplicationsExport('rejected'), 'rejected_applications.xlsx');
}
   
}
