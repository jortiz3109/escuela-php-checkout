<?php

namespace App\Helpers;

use App\Constants\ReasonCodes;
use App\Models\Session;
use App\Models\Transaction;

class StatusHelper
{
    public static function getTransactionStatus(string $reasonCode): string
    {
        if (in_array($reasonCode, ReasonCodes::APPROVED_REASON_CODES)) {
            return Transaction::STATUS_APPROVED;
        }

        return Transaction::STATUS_REJECTED;
    }

    public static function getSessionReasonCode(Session $session)
    {
        if ($session->status === Session::STATUS_PENDING) {
            return ReasonCodes::PENDING_SESSION;
        }

        return $session->lastTransaction()->response_code ?? ReasonCodes::EXPIRED_SESSION;
    }

    public static function getReasonCodeMessage(string $reasonCode): string
    {
        return trans('reason_codes.' . $reasonCode);
    }
}
