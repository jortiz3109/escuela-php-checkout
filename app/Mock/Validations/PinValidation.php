<?php

namespace App\Mock\Validations;

use App\Constants\ReasonCodes;
use App\Exceptions\TestingCardValidationException;
use Closure;

class PinValidation extends TestingCardValidation
{
    public function handle($card, Closure $next)
    {
        $pin = $card['pin'] ?? null;

        if ($this->testingCard->pin() && $this->testingCard->pin() !== $pin) {
            throw new TestingCardValidationException(ReasonCodes::INCORRECT_PIN);
        }

        return $next($card);
    }
}
