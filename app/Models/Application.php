<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'student_id',
        'fullname',
        'email',
        'contact_number',
        'resume_type',
        'resume',
        'endorsement_letter',
        'internship_agreement',
        'insurance',
        'status',
        'message'
    ];
}
