<?php

namespace App\Mock\Validations;

use App\Mock\TestingCard;
use Closure;

abstract class TestingCardValidation
{
    protected TestingCard $testingCard;

    public function __construct(TestingCard $testingCard)
    {
        $this->testingCard = $testingCard;
    }

    abstract public function handle($card, Closure $next);
}
