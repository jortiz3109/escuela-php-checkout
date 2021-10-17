<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Session extends Model
{
    use HasFactory;

    protected $casts = [
        'expiration' => 'datetime',
    ];

    public const STATUS_APPROVED = 'APPROVED';
    public const STATUS_PENDING = 'PENDING';
    public const STATUS_EXPIRED = 'EXPIRED';
    public const STATUSES = [
        self::STATUS_APPROVED,
        self::STATUS_PENDING,
        self::STATUS_EXPIRED,
    ];

    public $timestamps = false;

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function merchant(): BelongsTo
    {
        return  $this->belongsTo(Merchant::class);
    }

    public function getTotalAmountAttribute($value): ?string
    {
        $minorUnit = $this->currency->minor_unit;
        return bcdiv($value, bcpow(10, $minorUnit), $minorUnit);
    }

    public function setTotalAmountAttribute($value): void
    {
        $this->attributes['total_amount'] = bcmul($value, bcpow(10, $this->currency->minor_unit));
    }

    public function formattedAmount(): string
    {
        return number_format($this->total_amount, $this->currency->minor_unit);
    }
}
