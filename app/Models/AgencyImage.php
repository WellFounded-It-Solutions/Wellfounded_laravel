<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyImage extends Model
{
    use HasFactory;

    protected $table = 'agency_images';

    protected $fillable = [
        'user_id',
        'image',
    ];
}
