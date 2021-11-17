<?php

use App\Constants\ReasonCodes;
use App\Mock\Validations\CurrencyValidation;
use App\Mock\Validations\CvvValidation;
use App\Mock\Validations\ExpirationValidation;
use App\Mock\Validations\MaxAmountValidation;
use App\Mock\Validations\PinValidation;

return [
    'validation_rules' => [
        CvvValidation::class,
        ExpirationValidation::class,
        PinValidation::class,
        CurrencyValidation::class,
        MaxAmountValidation::class,
    ],

    'cards' => [
        '4110760000000008' => [
            'code' => ReasonCodes::APPROVED_TRANSACTION,
        ],
        '4110760000000016' => [
            'code' => ReasonCodes::INVALID_TRANSACTION,
        ],
        '4110760000000057' => [
            'code' => ReasonCodes::APPROVED_TRANSACTION,
            'maxAmount' => 200,
        ],
        '4012888888881881' => [
            'code' => ReasonCodes::APPROVED_TRANSACTION,
            'cvv' => '917',
            'expiration' => '11/28',
        ],
    ],
];
