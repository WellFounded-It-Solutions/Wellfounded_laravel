<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeveloperCertification extends Model
{
    use HasFactory;

    protected $table = 'developer_certifications';

    protected $fillable = [
        'user_id',
        'name',
        'issuing_organisation',
        'issuing_date',
    ];
}
