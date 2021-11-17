<?php

namespace App\Constants;

class ReasonCodes
{
    public const APPROVED_TRANSACTION = '00';

    public const INVALID_MERCHANT = '03';

    public const DO_NOT_HONOR = '05';
    public const ERROR = '06';

    public const REQUEST_IN_PROGRESS = '09';
    public const APPROVED_PARTIAL_AMOUNT = '10';
    public const APPROVED_VIP = '11';
    public const INVALID_TRANSACTION = '12';
    public const INVALID_AMOUNT = '13';
    public const INVALID_CARD_NUMBER = '14';

    public const INVALID_RESPONSE = '20';

    public const FORMAT_ERROR = '30';

    public const REQUESTED_FUNCTION_NOT_SUPPORTED = '40';

    public const NO_UNIVERSAL_ACCOUNT = '42';

    public const INSUFFICIENT_FUNDS = '51';
    public const NO_CHECKING_ACCOUNT = '52';
    public const NO_SAVINGS_ACCOUNT = '53';
    public const EXPIRED_CARD = '54';
    public const INCORRECT_PIN = '55';

    public const TRANSACTION_NOT_PERMITTED_TO_CARDHOLDER = '57';
    public const TRANSACTION_NOT_PERMITTED_TO_TERMINAL = '58';
    public const SUSPECTED_FRAUD = '59';

    public const RESTRICTED_CARD = '62';
    public const SECURITY_VIOLATION = '63';

    public const ALLOWED_PIN_TRIES_EXCEEDED = '75';

    public const CVV_VERIFICATION_FAILED = '89';

    public const ISSUER_OR_SWITCH_IS_INOPERATIVE = '91';

    public const LAW_VIOLATION = '93';
    public const DUPLICATION_TRANSACTION = '94';

    public const SYSTEM_MALFUNCTION = '96';

    public const EXPIRATION_DATE_MISMATCH = 'S9';
    public const INACTIVE_CARD = 'SA';

    public const ACCOUNT_CLOSED = 'SD';
    public const INELIGIBLE_ACCOUNT = 'SE';

    public const LOST_CARD = 'T3';
    public const CLOSED_ACCOUNT = 'T4';

    public const INVALID_CURRENCY = 'XC';
    public const PENDING_SESSION = '?-';

    public const APPROVED_REASON_CODES = [
        self::APPROVED_TRANSACTION,
        self::APPROVED_PARTIAL_AMOUNT,
        self::APPROVED_VIP,
    ];
}
