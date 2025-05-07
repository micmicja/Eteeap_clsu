<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;

    protected $table = 'requirements'; // Ensure it matches your database table name

    protected $fillable = [
        'user_id',
        'original_school_credentials',
        'certificate_of_employment',
        'nbi_barangay_clearance',
        'recommendation_letter',
        'proficiency_certificate',
    ];
}
