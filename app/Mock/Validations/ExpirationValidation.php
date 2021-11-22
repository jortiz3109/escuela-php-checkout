<?php

namespace App\Mock\Validations;

use App\Constants\ReasonCodes;
use App\Exceptions\TestingCardValidationException;
use Closure;

class ExpirationValidation extends TestingCardValidation
{
    public function handle($card, Closure $next)
    {
        $expiration = $card['expiration'] ?? null;

        if ($this->testingCard->expiration() && $this->testingCard->expiration() !== $expiration) {
            throw new TestingCardValidationException(ReasonCodes::EXPIRATION_DATE_MISMATCH);
        }

        return $next($card);
    }
}
