<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeveloperEducation extends Model
{
    use HasFactory;

    protected $table = 'developer_educations';

    protected $fillable = [
        'user_id',
        'education_title',
        'institute_name',
        'course_name',
        'is_present',
        'joining_date',
        'completion_date',
        'institute_logo',
    ];
}
