<?php

namespace App\Mock;

use App\Exceptions\TestingCardValidationException;
use App\Mock\Validations\CurrencyValidation;
use App\Mock\Validations\CvvValidation;
use App\Mock\Validations\ExpirationValidation;
use App\Mock\Validations\MaxAmountValidation;
use App\Mock\Validations\PinValidation;
use Illuminate\Pipeline\Pipeline;

class TestingCard
{
    private const VALIDATIONS_RULES = [
        CvvValidation::class,
        ExpirationValidation::class,
        PinValidation::class,
        CurrencyValidation::class,
        MaxAmountValidation::class,
    ];

    private string $number;
    private string $reasonCode;
    private ?string $expiration;
    private ?string $cvv;
    private ?string $pin;
    private ?string $currency;
    private ?float $maxAmount;
    private array $validations = [];

    public function __construct(string $number, array $options)
    {
        $this->number = $number;
        $this->reasonCode = $options['code'];
        $this->expiration = $options['expiration'] ?? null;
        $this->cvv = $options['cvv'] ?? null;
        $this->pin = $options['pin'] ?? null;
        $this->currency = $options['currency'] ?? null;
        $this->maxAmount = $options['maxAmount'] ?? null;
    }

    public function validate(array $card): string
    {
        try {
            return app(Pipeline::class)
                ->send($card)
                ->through($this->getValidations())
                ->then(fn () => $this->reasonCode);
        } catch (TestingCardValidationException $exception) {
            return $exception->getCardReasonCode();
        }
    }

    public function number(): string
    {
        return $this->number;
    }

    public function cvv(): ?string
    {
        return $this->cvv;
    }

    public function expiration(): ?string
    {
        return $this->expiration;
    }

    public function pin(): ?string
    {
        return $this->pin;
    }

    public function currency(): ?string
    {
        return $this->currency;
    }

    public function maxAmount(): ?float
    {
        return $this->maxAmount;
    }

    protected function getValidations(): array
    {
        if (empty($this->validations)) {
            $this->validations = array_map(function ($rule) {
                return new $rule($this);
            }, self::VALIDATIONS_RULES);
        }

        return $this->validations;
    }
}
