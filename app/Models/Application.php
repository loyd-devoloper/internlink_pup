<?php

namespace App\Models;

use App\Models\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'student_id',
        'company_id',
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

    public function jobInfo()
    {
        return $this->belongsTo(Job::class,'job_id');
    }
    public function userInfo()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    public function companyInfo()
    {
        return $this->belongsTo(Company::class,'company_id');
    }
}
