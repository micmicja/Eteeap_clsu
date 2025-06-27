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

    /**
     * Update the degree program for an application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateDegree(Request $request, $id)
    {
        // Accept both JSON and form data
        $degreeProgram = $request->input('degree_program', $request->degree_program);
        if (!$degreeProgram) {
            return response()->json(['success' => false, 'message' => 'Degree program is required.'], 422);
        }
        $application = ApplicationForm::findOrFail($id);
        $oldCourse = $application->degree_program;
        $application->degree_program = $degreeProgram;
        $application->save();

        if ($request->ajax()) {
            return response()->json(['success' => true, 'degree_program' => $application->degree_program]);
        }
        return redirect()->back()->with('success', 'Degree program changed from "' . $oldCourse . '" to "' . $degreeProgram . '" successfully.');
    }

    /**
     * Approve an application with a selected course.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve(Request $request)
    {
        $request->validate([
            'application_id' => 'required|exists:application_forms,i1d',
            'course' => 'required',
        ]);

        $application = ApplicationForm::find($request->application_id);
        $application->status = 'Approved';
        $application->degree_program = $request->course;
        $application->save();

        return redirect()->back()->with('success', 'Application approved successfully.');
    }
}