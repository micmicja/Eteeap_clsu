<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
        'interview_date',
        'interview_time',
        'interview_location',
    ];

    public function applicant()
    {
        return $this->belongsTo(ApplicationForm::class, 'applicant_id');
    }
}
