<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    public $timestamps = false;

    public const DEBIT_CATEGORY = 'DEBIT';
    public const CREDIT_CATEGORY = 'CREDIT';
    public const CATEGORIES = [
            self::DEBIT_CATEGORY,
            self::CREDIT_CATEGORY,
    ];
}
