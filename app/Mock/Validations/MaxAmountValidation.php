<?php

namespace App\Mock\Validations;

use App\Constants\ReasonCodes;
use App\Exceptions\TestingCardValidationException;
use Closure;

class MaxAmountValidation extends TestingCardValidation
{
    public function handle($card, Closure $next)
    {
        $amount = $card['amount'] ?? null;

        if ($this->testingCard->maxAmount() && (!$amount || $this->testingCard->maxAmount() < $amount)) {
            throw new TestingCardValidationException(ReasonCodes::INVALID_AMOUNT);
        }

        return $next($card);
    }
}
