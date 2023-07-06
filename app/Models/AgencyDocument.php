<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyDocument extends Model
{
    use HasFactory;

    protected $table = 'agency_documents';

    protected $fillable = [
        'user_id',
        'image',
        'name',
        'is_portfolio',
    ];
}
