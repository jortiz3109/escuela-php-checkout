<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Crypt;

class Card extends Model
{
    use HasFactory;

    protected ?string $cvv = null;
    protected ?string $expiration = null;
    protected ?string $pin = null;

    public $timestamps = false;

    public function transactions(): MorphMany
    {
        return $this->morphMany(Transaction::class, 'instrument');
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function cvv(): ?string
    {
        return $this->cvv;
    }

    public function setCvv(?string $cvv): void
    {
        $this->cvv = $cvv;
    }

    public function expiration(): ?string
    {
        return $this->expiration;
    }

    public function setExpiration(?string $expiration): void
    {
        $this->expiration = $expiration;
    }

    public function pin(): ?string
    {
        return $this->pin;
    }

    public function setPin(?string $pin): void
    {
        $this->pin = $pin;
    }

    public function toArray()
    {
        return [
            'card' => [
                'number' => Crypt::decryptString($this->pan),
                'cvv' => $this->cvv(),
                'expiration' => $this->expiration(),
                'pin' => $this->pin(),
            ]
        ];
    }
}
