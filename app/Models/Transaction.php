<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public $timestamps = false;

    public const STATUS_APPROVED = 'APPROVED';
    public const STATUS_PENDING = 'PENDING';
    public const STATUS_REJECTED = 'REJECTED';
    public const STATUS_FAILED = 'FAILED';

    public const STATUSES = [
        self::STATUS_APPROVED,
        self::STATUS_PENDING,
        self::STATUS_REJECTED,
        self::STATUS_FAILED,
    ];
}
