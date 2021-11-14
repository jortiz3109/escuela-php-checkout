<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class TestingCardValidationException extends Exception
{
    private string $reasonCode;

    public function __construct(string $reasonCode, $message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->reasonCode = $reasonCode;
    }

    /**
     * @return string
     */
    public function getCardReasonCode(): string
    {
        return $this->reasonCode;
    }
}
