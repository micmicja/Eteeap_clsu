<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InterviewSchedule;
use App\Models\ApplicationForm;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\InterviewScheduled;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Mail\RescheduleInterviewMail;
use Illuminate\Support\Facades\Log;
use App\Mail\RescheduleNotification;

class InterviewScheduleController extends Controller
{
    public function form($applicantId)
{
    $applicant = \App\Models\ApplicationForm::findOrFail($applicantId);
    $applicants = [$applicant]; 
    return view('admin.accepted_applicants.reschedule', compact('applicants'));
}


    public function index()
    {
        $schedules = InterviewSchedule::with('applicant')->get();
        return view('schedule.index', compact('schedules'));
    }

    public function create(Request $request)
    {
        $applicantIds = $request->input('applicant_ids', []);

        if (empty($applicantIds)) {
            return redirect()->route('accepted_applicants.index')->with('error', 'Please select at least one applicant before scheduling.');
        }

        $applicants = ApplicationForm::whereIn('id', $applicantIds)->get();
        return view('admin.accepted_applicants.schedule', compact('applicants', 'applicantIds'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'applicant_ids' => 'required|array',
            'applicant_ids.*' => 'exists:application_forms,id',
            'location' => 'required|string',
            'schedule.date_time' => 'required|string',
        ]);

        [$selectedDate, $selectedTime] = explode('|', $request->input('schedule.date_time'));

        foreach ($request->input('applicant_ids') as $applicantId) {
            $applicant = ApplicationForm::find($applicantId);
            $user = User::find($applicant->user_id);

            if (!$user || empty($user->email)) {
                return redirect()->back()->with('error', "Applicant {$applicant->full_name} is missing an email address.");
            }

            $existingSchedule = InterviewSchedule::where('applicant_id', $applicantId)->first();
            if ($existingSchedule) {
                return redirect()->back()->with('error', "Applicant {$applicant->full_name} already has a scheduled interview.");
            }

            InterviewSchedule::create([
                'applicant_id' => $applicantId,
                'interview_date' => $selectedDate,
                'interview_time' => $selectedTime,
                'interview_location' => $request->input('location'),
            ]);

            try {
                Mail::to($user->email)->send(new InterviewScheduled($applicant, [
                    'date' => $selectedDate,
                    'time' => $selectedTime,
                    'location' => $request->input('location'),
                ]));
            } catch (\Exception $e) {
                Log::error("Failed to send interview email: " . $e->getMessage());
            }
        }

        return redirect()->route('accepted_applicants.index')->with('success', 'Interview scheduled successfully, and emails sent!');
    }

    
    public function showRescheduleForm($id)
    {
      
        $schedule = InterviewSchedule::find($id);
    
     
        if (!$schedule) {
            return redirect()->back()->with('error', 'Schedule not found.');
        }
   
        $applicant = ApplicationForm::find($schedule->applicant_id);
    
   
        if (!$applicant) {
            return redirect()->back()->with('error', 'Applicant not found.');
        }
    
      
        $today = Carbon::now();
        $startOfWeek = $today->startOfWeek();
        $weekDates = [];
        for ($i = 0; $i < 5; $i++) {
            $weekDates[$i] = $startOfWeek->copy()->addDays($i);
        }
    
      
        return view('admin.accepted_applicants.reschedule', [
            'schedule' => $schedule,
            'applicants' => [$applicant], 
            'weekDates' => $weekDates
        ]);
    }
    

    public function updateReschedule(Request $request, $id)
{
    Log::info('🔄 Rescheduling interview for schedule ID: ' . $id);

   
    $request->validate([
        'location' => 'required|string|max:255',
        'schedule.date_time' => 'required|string', 
    ]);

    $schedule = InterviewSchedule::findOrFail($id);
    $applicant = ApplicationForm::find($schedule->applicant_id);

    if (!$applicant) {
        Log::error('❌ Applicant not found for schedule ID: ' . $id);
        return back()->with('error', 'Applicant not found.');
    }

    if (!$applicant->user) {
        Log::error('❌ User not found for applicant ID: ' . $applicant->id);
        return back()->with('error', 'User not found.');
    }

    Log::info('✅ Found applicant: ' . $applicant->first_name . ' ' . $applicant->last_name);
    Log::info('📧 Sending reschedule email to: ' . $applicant->user->email);

  
    $schedule->update([
        'interview_location' => $request->input('location'),
        'interview_date' => explode('|', $request->input('schedule.date_time'))[0],
        'interview_time' => explode('|', $request->input('schedule.date_time'))[1],
    ]);

   
    try {
        Mail::to($applicant->user->email)->send(new RescheduleInterviewMail($applicant, $schedule));
        Log::info('✅ Reschedule email sent successfully!');
        return redirect()->route('accepted_applicants.index')->with('success', 'Interview rescheduled and email sent.');
    } catch (\Exception $e) {
        Log::error('❌ Failed to send reschedule email: ' . $e->getMessage());
        return back()->with('error', 'Failed to send reschedule email.');
    }
}

    public function reschedule(Request $request, $scheduleId)
    {
        $schedule = InterviewSchedule::findOrFail($scheduleId);
        $applicant = ApplicationForm::findOrFail($schedule->application_form_id); 

       
        $schedule->interview_date = $request->input('interview_date');
        $schedule->interview_time = $request->input('interview_time');
        $schedule->interview_location = $request->input('location');
        $schedule->save();

     
        try {
            Mail::to($applicant->email)->send(new RescheduleInterviewMail($applicant, $schedule));
            return redirect()->route('admin.accepted_applicants.index')->with('success', 'Interview rescheduled and notification sent.');
        } catch (\Exception $e) {
            Log::error('Failed to send reschedule email: ' . $e->getMessage());
            return back()->with('error', 'Failed to send reschedule email.');
        }
    }
}



