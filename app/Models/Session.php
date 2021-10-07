<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    public const STATUS_APPROVED = 'APPROVED';
    public const STATUS_PENDING = 'PENDING';
    public const STATUS_EXPIRED = 'EXPIRED';
    public const STATUSES = [
        self::STATUS_APPROVED,
        self::STATUS_PENDING,
        self::STATUS_EXPIRED,
    ];

    public $timestamps = false;

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
