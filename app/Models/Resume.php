<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resume extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'profile',
        'linkedin',
        'github',
        'facebook',
        'mobile_phone',
        'course',
        'student_number',
        'address',
        'about_me',
        'e_school_name',
        'e_start',
        'e_end',
        'j_school_name',
        'j_start',
        'j_end',
        's_school_name',
        's_start',
        's_end',
        'c_school_name',
        'c_start',
        'certificate_name1',
        'certificate_name2',
        'certificate_name3',
        'certificate_name4',
        'certificate_name5',
        'pskill1',
        'prating1',
        'pskill2',
        'prating2',
        'pskill3',
        'prating3',
        'pskill4',
        'prating4',
        'pskill5',
        'prating5',
        'hskill1',
        'hrating1',
        'hskill2',
        'hrating2',
        'hskill3',
        'hrating3',
        'hskill4',
        'hrating4',
        'hskill5',
        'hrating5',
        'sskill1',
        'srating1',
        'sskill2',
        'srating2',
        'sskill3',
        'srating3',
        'student_id'
    ];

    public function studentInfo()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
}
