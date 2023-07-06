<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeveloperExperience extends Model
{
    use HasFactory;

    protected $table = 'developer_experiences';

    protected $fillable = [
        'user_id',
        'job_title',
        'company_position',
        'company_name',
        'joining_date',
        'resign_date',
        'is_present',
        'company_logo',
        'description',
    ];
}
