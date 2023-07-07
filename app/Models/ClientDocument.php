<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientDocument extends Model
{
    use HasFactory;

    protected $table = 'client_documents';

    protected $fillable = [
        'user_id',
        'image',
        'name',
        'is_portfolio',
    ];
}
