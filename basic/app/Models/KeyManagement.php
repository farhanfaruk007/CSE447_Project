<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyManagement extends Model
{
    use HasFactory;

    protected $table = 'key_management';

    protected $fillable = [
        'public_key',
        'private_key',
    ];

    // Define relationships if necessary
}
