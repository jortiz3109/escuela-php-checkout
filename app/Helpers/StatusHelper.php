<?php

namespace App\Helpers;

use App\Constants\ReasonCodes;
use App\Models\Transaction;

class StatusHelper
{
    public static function getTransactionStatus(string $reasonCode)
    {
        if (in_array($reasonCode, ReasonCodes::APPROVED_REASON_CODES)) {
            return Transaction::STATUS_APPROVED;
        }

        return Transaction::STATUS_REJECTED;
    }

    public static function getTransactionMessage(string $reasonCode)
    {
        return trans('reason_codes.'.$reasonCode);
    }
}
