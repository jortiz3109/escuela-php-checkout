<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\PersonalAccessToken;

class Token extends PersonalAccessToken
{
    use HasFactory;

    protected $casts = [
        'abilities' => 'json',
        'expiration' => 'datetime',
        'last_used_at' => 'datetime',
    ];

    protected $fillable = [
        'name',
        'token',
        'abilities',
        'expiration',
    ];
}
