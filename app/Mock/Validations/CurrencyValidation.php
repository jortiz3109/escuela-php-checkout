<?php

namespace App\Mock\Validations;

use App\Constants\ReasonCodes;
use App\Exceptions\TestingCardValidationException;
use Closure;

class CurrencyValidation extends TestingCardValidation
{
    public function handle($card, Closure $next)
    {
        $currency = $card['currency'] ?? null;

        if ($this->testingCard->currency() && $this->testingCard->currency() !== $currency) {
            throw new TestingCardValidationException(ReasonCodes::INVALID_CURRENCY);
        }

        return $next($card);
    }
}
