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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'degree_program' => 'array',
        'school_address' => 'array', 
        'inclusive_dates' => 'array',
        'training_program' => 'array',
        'certificate_obtained' => 'array',
        'dates_attendance' => 'array',
        'certification_examination' => 'array',
        'certifying_agency' => 'array',
        'date_certified' => 'array',
        'rating' => 'array',
        'awards_conferred' => 'array',
        'conferring_organizations' => 'array',
        'date_awarded' => 'array',
        'community_awards_conferred' => 'array',
        'community_conferring_organizations' => 'array',
        'community_date_awarded' => 'array',
        'work_awards_conferred' => 'array',
        'work_community_conferring_organizations' => 'array',
        'work_community_date_awarded' => 'array',
    ];
    
    /**
     * Safe method to display array or string fields
     */
    public function displayField($field)
    {
        $value = $this->getAttribute($field);
        
        // Handle null or empty values
        if (empty($value)) {
            return '';
        }
        
        // If it's already a string and not JSON, return it
        if (is_string($value) && !$this->isJson($value)) {
            return $value;
        }
        
        // If it's a string that contains JSON, decode it
        if (is_string($value) && $this->isJson($value)) {
            $decoded = json_decode($value, true);
            if (is_array($decoded)) {
                return implode(', ', array_filter(array_map('strval', $decoded)));
            }
        }
        
        // If it's an array, join it
        if (is_array($value)) {
            return implode(', ', array_filter(array_map('strval', $value)));
        }
        
        // Fallback to string conversion
        return (string) $value;
    }
    
    /**
     * Check if a string is valid JSON
     */
    private function isJson($string)
    {
        if (!is_string($string)) {
            return false;
        }
        
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }
    
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
