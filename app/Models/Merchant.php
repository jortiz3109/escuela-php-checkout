<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Merchant extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class);
    }
}
