<?php

namespace App\Mock\Validations;

use App\Constants\ReasonCodes;
use App\Exceptions\TestingCardValidationException;
use Closure;

class CvvValidation extends TestingCardValidation
{
    public function handle($card, Closure $next)
    {
        $cvv = $card['cvv'] ?? null;

        if ($this->testingCard->cvv() && $this->testingCard->cvv() !== $cvv) {
            throw new TestingCardValidationException(ReasonCodes::CVV_VERIFICATION_FAILED);
        }

        return $next($card);
    }
}
