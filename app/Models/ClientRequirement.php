<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientRequirement extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'jobTitle',
        'status',
        'noOfDevelopers',
        'experience',
        'budget',
        'skills',
        'secondarySkills',
        'developerType',
        'jobType',
        'duration',
        'description',
        'currentStatus'
    ];
}
