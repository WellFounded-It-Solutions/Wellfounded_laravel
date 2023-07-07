<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSkill extends Model
{
    use HasFactory;

    protected $table = 'client_skills';

    protected $fillable = [
        'user_id',
        'skill_name',
        'noOfDevelopers',
    ];
}
