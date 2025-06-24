<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\InterviewSchedule;

class ApplicationForm extends Model
{
    use HasFactory;
    protected $table = 'application_forms'; // Ensure it matches your SQL table name

    protected $fillable = [
      'user_id',
      'status',
      'first_name', 
      'middle_name',
      'last_name', 
      'contact_number',
      'house_no',
      'street',
      'barangay',
      'city',
      'province',
      'zipcode',
      'country',
      'address', 
      'birthdate', 
      'birthplace',
      'civil_status', 
      'sex',
      'language',
      'degree_program_field', 
      'first_priority',
      'second_priority', 
      'third_priority', 
      'goals_objectives', 
      'learning_activities',
      'overseas_applicants', 
      'equivalency_accreditation', 
      'degree_program',
      'school_address',
      'inclusive_dates', 
      'training_program', 
      'certificate_obtained', 
      'dates_attendance',
      'certification_examination',
      'certifying_agency', 
      'date_certified',
      'rating',
      'position_designation',
      'dates_of_employment',
      'address_of_company',
      'status_of_employment',
      'designation_of_immediate', 
      'reasons_for_moving',
      'responsibilities_in_position',
      'case_of_self_employment', 
      'awards_conferred', 
      'conferring_organizations', 
      'date_awarded',
      'community_awards_conferred', 
      'community_conferring_organizations', 
      'community_date_awarded',
      'work_awards_conferred', 
      'work_community_conferring_organizations', 
      'work_community_date_awarded',
      'accomplishment_description', 
      'date_accomplished',
      'address_of_publishing', 
      'leisure_activities',
      'special_skills', 
      'work_related_activities',
      'volunteer_activities', 
      'travels_cite_places',
      'essay_of_degree', 
      'declaration_place', 
      'declaration_day', 
      'declaration_month_year',
      'printed_name', 
      'profile_image',  
      'community_tax_certificate',
      'issued_on', 'issued_at',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function interviewSchedule()
{
    return $this->hasOne(InterviewSchedule::class, 'applicant_id', 'id');
}
public function schedule()
{
    return $this->hasOne(InterviewSchedule::class, 'applicant_id', 'id');
}
}
