<?php

use App\Constants\ReasonCodes;

return [
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
    ]
];
