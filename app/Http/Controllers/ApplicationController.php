<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationForm;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Requirement;
class ApplicationController extends Controller
{
    
    public function index()
    {
   
    $applications = ApplicationForm::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

    return view('user.index', compact('applications'));
    }
    public function create()
    {
        return view('information');
    }

    public function store(Request $request)
    {
 
    $user = auth()->user();

  
    if ($user->submission_count >= 2) {
  
        session()->flash('submission_limit_reached', true);
        return redirect()->back(); 
    }


    session()->flash('submission_success', true);

   

    
        
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'contact_number' => 'nullable|string|max:20',
            'address' => 'required|string',
            'birthdate' => 'required|date',
            'birthplace' => 'required|string|max:255',
            'civil_status' => 'required|in:Single,Married,Divorced,Widowed',
            'sex' => 'required|in:Male,Female,Other',
            'language' => 'required|string|max:100',
            'degree_program_field' => 'required|string|max:255',
            'first_priority' => 'nullable|string|max:255',
            'second_priority' => 'nullable|string|max:255',
            'third_priority' => 'nullable|string|max:255',
            'goals_objectives' => 'nullable|string',
            'learning_activities' => 'nullable|string',
            'overseas_applicants' => 'nullable|string',
            'equivalency_accreditation' => 'required|in:Less than 1 year,1 year,2 years,3 years',

            'degree_program' => 'required|array',
            'degree_program.*' => 'required|string|max:255', 
            'school_address' => 'required|array', 
            'school_address.*' => 'required|string',
            'inclusive_dates' => 'required|array',
            'inclusive_dates.*' => 'required|string',

            'training_program' => 'required|array',
            'training_program.*' => 'required|string|max:255',
            'certificate_obtained' => 'required|array',
            'certificate_obtained.*' => 'required|string|max:255',
            'dates_attendance' => 'required|array',  
            'dates_attendance.*' => 'required|string|max:255', 

            'certification_examination' => 'required|array',
            'certification_examination.*' => 'required|string|max:255',
            'certifying_agency' => 'required|array',
            'certifying_agency.*' => 'required|string|max:255',
            'date_certified' => 'required|array',  
            'date_certified.*' => 'required|string|max:255',  
            'rating' => 'required|array',
            'rating.*' => 'required|string|max:255',

            'position_designation' => 'nullable|string|max:255',
            'dates_of_employment' => 'nullable|string|max:255',
            'address_of_company' => 'nullable|string',
            'status_of_employment' => 'nullable|string|max:255',
            'designation_of_immediate' => 'nullable|string|max:255',
            'reasons_for_moving' => 'nullable|string',
            'responsibilities_in_position' => 'nullable|string',
            'case_of_self_employment' => 'nullable|string',

            
            'awards_conferred' => 'required|array',
            'awards_conferred.*' => 'required|string',
            'conferring_organizations' => 'required|array',
            'conferring_organizations.*' => 'required|string',
            'date_awarded' => 'required|array',  
            'date_awarded.*' => 'required|string',
            
            'community_awards_conferred' => 'required|array',
            'community_awards_conferred.*' => 'required|string',
            'community_conferring_organizations' => 'required|array',
            'community_conferring_organizations.*' => 'required|string',
            'community_date_awarded' => 'required|array',  
            'community_date_awarded.*' => 'required|string', 

            'work_awards_conferred' => 'required|array',
            'work_awards_conferred.*' => 'required|string',
            'work_community_conferring_organizations' => 'required|array',
            'work_community_conferring_organizations.*' => 'required|string',
            'work_community_date_awarded' => 'required|array',  
            'work_community_date_awarded.*' => 'required|string',  

            'accomplishment_description' => 'nullable|string',
            'date_accomplished' => 'nullable|date',
            'address_of_publishing' => 'nullable|string',
            'leisure_activities' => 'nullable|string',
            'special_skills' => 'nullable|string',
            'work_related_activities' => 'nullable|string',
            'volunteer_activities' => 'nullable|string',
            'travels_cite_places' => 'nullable|string',
            'essay_of_degree' => 'nullable|string',

            'declaration_place' => 'nullable|string|max:255',
            'declaration_day' => 'nullable|string|max:255',
            'declaration_month_year' => 'nullable|string|max:255',
            'printed_name' => 'required|string|max:255',
            'signature_image' => 'nullable|image|mimes:jpg,png|max:2048',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'community_tax_certificate' => 'required|string|max:255',
            'issued_on' => 'required|date',
            'issued_at' => 'required|string|max:255',

            'original_school_credentials' => 'nullable|image|mimes:jpg,png|max:2048',
            'certificate_of_employment' => 'nullable|image|mimes:jpg,png|max:2048',
            'nbi_barangay_clearance' => 'nullable|image|mimes:jpg,png|max:2048',
            'recommendation_letter' => 'nullable|image|mimes:jpg,png|max:2048',
            'proficiency_certificate' => 'nullable|image|mimes:jpg,png|max:2048',
        ]); 
        if ($request->hasFile('signature_image')) {
            $signaturePath = $request->file('signature_image')->store('signatures', 'public');
        } else {
            $signaturePath = null;
        }
        if($request->has('profile_image')){

            $file = $request->file('profile_image');
            $extension =$file ->getClientOriginalExtension();

            $filename =time().'.'.$extension;
            $path ='public/profile_images/';
            $file->move($path,$filename);

        }
        
        


        ApplicationForm::create([
            'user_id' => auth()->id(), 
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'contact_number' => $request->contact_number,

            'birthdate' => $request->birthdate,
            'birthplace' => $request->birthplace,
            'civil_status' => $request->civil_status,
            'sex' => $request->sex,
            'language' => $request->language,
            'degree_program_field' => $request->degree_program_field,
            'first_priority' => $request->first_priority,
            'second_priority' => $request->second_priority,
            'third_priority' => $request->third_priority,
            'goals_objectives' => $request->goals_objectives,
            'learning_activities' => $request->learning_activities,
            'overseas_applicants' => $request->overseas_applicants,
            'equivalency_accreditation' => $request->equivalency_accreditation,
            
            'degree_program' => json_encode($request->degree_program),
            'school_address' => json_encode($request->school_address),
            'inclusive_dates' => json_encode($request->inclusive_dates),
            'training_program' => json_encode($request->training_program),
            'certificate_obtained' => json_encode($request->certificate_obtained),
            'dates_attendance' => json_encode($request->dates_attendance ?? []),

            'certification_examination' => json_encode($request->certification_examination),
            'certifying_agency' => json_encode($request->certifying_agency),
            'date_certified' => json_encode($request->date_certified),
            'rating' => json_encode($request->rating),

            'position_designation' => $request->position_designation,
            'dates_of_employment' => $request->dates_of_employment,
            'address_of_company' => $request->address_of_company,
            'status_of_employment' => $request->status_of_employment,
            'designation_of_immediate' => $request->designation_of_immediate,
            'reasons_for_moving' => $request->reasons_for_moving,
            'responsibilities_in_position' => $request->responsibilities_in_position,
            'case_of_self_employment' => $request->case_of_self_employment,

            'awards_conferred' => json_encode($request->awards_conferred),
            'conferring_organizations' => json_encode($request->conferring_organizations),
            'date_awarded' => json_encode($request->date_awarded),

            'community_awards_conferred' => json_encode($request->community_awards_conferred),
            'community_conferring_organizations' => json_encode($request->community_conferring_organizations),
            'community_date_awarded' => json_encode($request->community_date_awarded),

            'work_awards_conferred' => json_encode($request->work_awards_conferred),
            'work_community_conferring_organizations' => json_encode($request->work_community_conferring_organizations),
            'work_community_date_awarded' => json_encode($request->work_community_date_awarded),

            'accomplishment_description' => $request->accomplishment_description,
            'date_accomplished' => $request->date_accomplished,
            'address_of_publishing' => $request->address_of_publishing,
            'leisure_activities' => $request->leisure_activities,
            'special_skills' => $request->special_skills,
            'work_related_activities' => $request->work_related_activities,
            'volunteer_activities' => $request->volunteer_activities,
            'travels_cite_places' => $request->travels_cite_places,
            'essay_of_degree' => $request->essay_of_degree,

            'declaration_place' => $request->declaration_place,
            'declaration_day' => $request->declaration_day,
            'declaration_month_year' => $request->declaration_month_year,
            'printed_name' => $request->printed_name,
            'profile_image' => $path.$filename,
            'signature_image' => $signaturePath,
            'community_tax_certificate' => $request->community_tax_certificate,
            'issued_on' => $request->issued_on,
            'issued_at' => $request->issued_at,
        ]);

            $user->increment('submission_count');
            $user = auth()->user();
            $requirementFields = [
                'original_school_credentials',
                'certificate_of_employment',
                'nbi_barangay_clearance',
                'recommendation_letter',
                'proficiency_certificate'
            ];

            $requirement = Requirement::firstOrNew(['user_id' => $user->id]);

            if ($request->has('requirements')) {
                foreach ($requirementFields as $field) {
                    if ($request->hasFile('requirements.' . $field)) {
                        $file = $request->file('requirements.' . $field);
                        $filename = $user->id . '_' . $field . '.' . $file->getClientOriginalExtension();
                        $file->storeAs('public/requirements', $filename);
                        $requirement->$field = $filename;
                    }
                }
            }

            $requirement->user_id = $user->id;
            $requirement->save();

            return redirect()->route('user.index')->with('success', 'Application submitted successfully!');

    }
    public function view($id)
    {
        $application = ApplicationForm::findOrFail($id);
        $requirement = Requirement::where('user_id', $application->user_id)->first();
    
     
        $degree_programs = json_decode($application->degree_program, true) ?? [];
        $school_addresses = json_decode($application->school_address, true) ?? [];
        $inclusive_dates = json_decode($application->inclusive_dates, true) ?? [];
    
       
        $training_programs = json_decode($application->training_program, true) ?? [];
        $certificate_obtained = json_decode($application->certificate_obtained, true) ?? [];
        $dates_attendance = json_decode($application->dates_attendance, true) ?? [];

    
        $certification_examination = json_decode($application->certification_examination, true) ?? [];
        $certifying_agency = json_decode($application->certifying_agency, true) ?? [];
        $date_certified = json_decode($application->date_certified, true) ?? [];
        $rating = json_decode($application->rating, true) ?? [];

        $awards_conferred = json_decode($application->awards_conferred, true) ?? [];
        $conferring_organizations = json_decode($application->conferring_organizations, true) ?? [];
        $date_awarded = json_decode($application->date_awarded, true) ?? [];

        $community_awards_conferred = json_decode($application->community_awards_conferred, true) ?? [];
        $community_conferring_organizations = json_decode($application->community_conferring_organizations, true) ?? [];
        $community_date_awarded = json_decode($application->community_date_awarded, true) ?? [];

        $work_awards_conferred = json_decode($application->work_awards_conferred, true) ?? [];
        $work_community_conferring_organizations = json_decode($application->work_community_conferring_organizations, true) ?? [];
        $work_community_date_awarded = json_decode($application->work_community_date_awarded, true) ?? [];
        
            
        return view('application.view', compact(
            'application',
            'requirement',
            'degree_programs',
            'school_addresses',
            'inclusive_dates',
            'training_programs',
            'certificate_obtained',
            'dates_attendance',
            'certification_examination',
            'certifying_agency', 
            'date_certified', 
            'rating',
            'awards_conferred',
            'conferring_organizations',
            'date_awarded',
            'community_awards_conferred',
            'community_conferring_organizations',
            'community_date_awarded',
            'work_awards_conferred',
            'work_community_conferring_organizations',
            'work_community_date_awarded'

        ));
    }
    
    public function show($id)
    {
        $application = ApplicationForm::findOrFail($id);
        $degree_programs = json_decode($application->degree_program, true) ?? [];
        $school_addresses = json_decode($application->school_address, true) ?? [];
        $inclusive_dates = json_decode($application->inclusive_dates, true) ?? [];

        $training_programs = json_decode($application->training_program, true) ?? [];
        $certificate_obtained = json_decode($application->certificate_obtained, true) ?? [];
        $dates_attendance = json_decode($application->dates_attendance, true) ?? [];

        $certification_examination = json_decode($application->certification_examination, true) ?? [];
        $certifying_agency = json_decode($application->certifying_agency, true) ?? [];
        $date_certified = json_decode($application->date_certified, true) ?? [];
        $rating = json_decode($application->rating, true) ?? [];

        $awards_conferred = json_decode($application->awards_conferred, true) ?? [];
        $conferring_organizations = json_decode($application->conferring_organizations, true) ?? [];
        $date_awarded = json_decode($application->date_awarded, true) ?? [];

        $community_awards_conferred = json_decode($application->community_awards_conferred, true) ?? [];
        $community_conferring_organizations = json_decode($application->community_conferring_organizations, true) ?? [];
        $community_date_awarded = json_decode($application->community_date_awarded, true) ?? [];

        $work_awards_conferred = json_decode($application->work_awards_conferred, true) ?? [];
        $work_community_conferring_organizations = json_decode($application->work_community_conferring_organizations, true) ?? [];
        $work_community_date_awarded = json_decode($application->work_community_date_awarded, true) ?? [];
        
    
        return view('application.view', compact(
            'degree_programs',
            'school_addresses',
            'inclusive_dates',
            'training_programs',
            'certificate_obtained',
            'dates_attendance',
            'certification_examination',
            'certifying_agency', 
            'date_certified', 
            'rating',
            'awards_conferred',
            'conferring_organizations',
            'date_awarded',
            'community_awards_conferred',
            'community_conferring_organizations',
            'community_date_awarded',
            'work_awards_conferred',
            'work_community_conferring_organizations',
            'work_community_date_awarded'
            
        ));
    }
    public function edit($id)
    {
        $application = ApplicationForm::findOrFail($id);
    
        
        $degree_programs = explode(',', $application->degree_program);
        $school_addresses = explode(',', $application->school_address);
        $inclusive_dates = explode(',', $application->inclusive_dates);

        $training_program = explode(',', $application->training_program);
        $certificate_obtained = explode(',', $application->certificate_obtained);
        $dates_attendance = explode(',', $application->dates_attendance);

        $certification_examination = explode(',', $application->certification_examination);
        $certifying_agency = explode(',', $application->certifying_agency);
        $date_certified = explode(',', $application->date_certified);
        $rating = explode(',', $application->rating);

        $awards_conferred = explode(',', $application->awards_conferred);
        $conferring_organizations = explode(',', $application->conferring_organizations);
        $date_awarded = explode(',', $application->date_awarded);

        $community_awards_conferred = explode(',', $application->community_awards_conferred);
        $community_conferring_organizations = explode(',', $application->community_conferring_organizations);
        $community_date_awarded = explode(',', $application->community_date_awarded);

        $work_awards_conferred = explode(',', $application->work_awards_conferred);
        $work_community_conferring_organizations = explode(',', $application->work_community_conferring_organizations);
        $work_community_date_awarded = explode(',', $application->work_community_date_awarded);
        
        $requirement = Requirement::where('user_id', $application->user_id)->first();
        return view('application.edit', compact(
            'application',
            'degree_programs',
            'school_addresses',
            'inclusive_dates',
            'training_program' ,
            'certificate_obtained',
            'dates_attendance',
            'certification_examination',
            'certifying_agency',
            'date_certified',
            'rating',
            'awards_conferred',
            'conferring_organizations',
            'date_awarded',
            'community_awards_conferred',
            'community_conferring_organizations',
            'community_date_awarded',
            'work_awards_conferred',
            'work_community_conferring_organizations',
            'work_community_date_awarded',
            'requirement'
        ));
    }

    public function update(Request $request, $id)
{
    try {
        $application = ApplicationForm::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'printed_name' => 'required|string|max:255',
            'community_tax_certificate' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:20',
        ]);

       
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('profile_images', $filename, 'public');
            $application->profile_image = $path; 
        }

      
        $fields = [
            'user_id' => auth()->id(),
            'first_name', 'middle_name', 'last_name', 'address',
            'birthdate', 'birthplace', 'civil_status', 'sex',
            'language', 'degree_program_field', 'first_priority',
            'second_priority', 'third_priority', 'goals_objectives',
            'learning_activities', 'overseas_applicants', 'equivalency_accreditation',
            'position_designation', 'dates_of_employment', 'address_of_company',
            'status_of_employment', 'designation_of_immediate', 'reasons_for_moving',
            'responsibilities_in_position', 'case_of_self_employment',
            'accomplishment_description', 'date_accomplished', 'address_of_publishing',
            'leisure_activities', 'special_skills', 'work_related_activities',
            'volunteer_activities', 'travels_cite_places', 'essay_of_degree',
            'declaration_place', 'declaration_day', 'declaration_month_year',
            'printed_name', 'community_tax_certificate', 'issued_on', 'issued_at', 'contact_number'
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                $application->$field = $request->$field;
            }
        }

      
        $arrayFields = [
            'degree_program', 'school_address', 'inclusive_dates',
            'training_program', 'certificate_obtained', 'dates_attendance',
            'certification_examination', 'certifying_agency', 'date_certified', 'rating',
            'awards_conferred', 'conferring_organizations', 'date_awarded',
            'community_awards_conferred', 'community_conferring_organizations', 'community_date_awarded',
            'work_awards_conferred', 'work_community_conferring_organizations', 'work_community_date_awarded',
        ];

        foreach ($arrayFields as $field) {
            if ($request->has($field) && is_array($request->$field)) {
                $application->$field = json_encode($request->$field);
            }
        }

        $application->save();

        // Handle requirements file uploads
        $user = auth()->user();
        $requirementFields = [
            'original_school_credentials',
            'certificate_of_employment',
            'nbi_barangay_clearance',
            'recommendation_letter',
            'proficiency_certificate'
        ];
        $requirement = \App\Models\Requirement::firstOrNew(['user_id' => $user->id]);
        if ($request->has('requirements')) {
            foreach ($requirementFields as $field) {
                if ($request->hasFile('requirements.' . $field)) {
                    $file = $request->file('requirements.' . $field);
                    $filename = $user->id . '_' . $field . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/requirements', $filename);
                    $requirement->$field = $filename;
                }
            }
        }
        $requirement->user_id = $user->id;
        $requirement->save();

        return redirect()->route('user.index')->with('success', 'Application updated successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}

public function destroy($id)
{
    $application = ApplicationForm::findOrFail($id);

   
    if ($application->user_id !== Auth::id()) {
        return redirect()->back()->with('error', 'Unauthorized action.');
    }

    
    $application->delete();

 
    $user = Auth::user();
    if ($user->submission_count > 0) {
        $user->decrement('submission_count');
    }

    return redirect()->back()->with('success', 'Application deleted successfully. You can now submit again.');
}

}


