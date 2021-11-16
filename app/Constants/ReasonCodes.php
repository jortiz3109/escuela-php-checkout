<?php

namespace App\Constants;

class ReasonCodes
{
    public const APPROVED_TRANSACTION = '00';

    public const INVALID_MERCHANT = '03';

    public const DO_NOT_HONOR = '05';
    public const ERROR = '06';

    public const HONOR_WITH_IDENTIFICATION = '08';
    public const REQUEST_IN_PROGRESS = '09';
    public const APPROVED_PARTIAL_AMOUNT = '10';
    public const APPROVED_VIP = '11';
    public const INVALID_TRANSACTION = '12';
    public const INVALID_AMOUNT = '13';
    public const INVALID_CARD_NUMBER = '14';
    public const NO_SUCH_ISSUER = '15';
    public const APPROVED_UPDATE_TRACK_3 = '16';
    public const CUSTOMER_CANCELLATION_REVERSAL = '17';
    public const CUSTOMER_DISPUTE_CHARGEBACK = '18';
    public const RE_ENTER_TRANSACTION = '19';
    public const INVALID_RESPONSE = '20';
    public const NO_ACTION_TAKEN_REVERSAL = '21';
    public const SUSPECTED_MALFUNCTION_REVERSAL = '22';
    public const UNACCEPTABLE_TRANSACTION_FEE = '23';

    public const FORMAT_ERROR = '30';
    public const BANK_NOT_SUPPORTED_BY_SWITCH = '31';
    public const COMPLETED_PARTIAL_REVERSAL = '32';

    public const NO_CREDIT_ACCOUNT = '39';
    public const REQUESTED_FUNCTION_NOT_SUPPORTED = '40';

    public const NO_UNIVERSAL_ACCOUNT = '42';

    public const INSUFFICIENT_FUNDS = '51';
    public const NO_CHECKING_ACCOUNT = '52';
    public const NO_SAVINGS_ACCOUNT = '53';
    public const EXPIRED_CARD = '54';
    public const INCORRECT_PIN = '55';
    public const NO_CARD_RECORD = '56';
    public const TRANSACTION_NOT_PERMITTED_TO_CARDHOLDER = '57';
    public const TRANSACTION_NOT_PERMITTED_TO_TERMINAL = '58';
    public const SUSPECTED_FRAUD = '59';
    public const CARD_ACEPTOR_CONTACT_ACQUIRER = '60';
    public const EXCEEDED_WITHDRAWAL_AMOUNT_LIMIT = '61';
    public const RESTRICTED_CARD = '62';
    public const SECURITY_VIOLATION = '63';
    public const ORIGINAL_AMOUNT_INCORRECT_REVERSAL = '64';
    public const EXCEEDED_WITHDRAWAL_FREQUENCY_LIMIT = '65';
    public const CARD_ACEPTOR_CALL_ACQUIRER_SECURITY = '66';
    public const HARD_CAPTURE_PICK_UP = '67';
    public const RESPONSE_RECEIVED_TOO_LATE_REVERSAL = '68';

    public const ALLOWED_PIN_TRIES_EXCEEDED = '75';
    public const KEY_SYNCHRONIZATION_ERROR = '76';

    public const CUSTOMER_NOT_ELEGIBLE_FOR_POS = '78';
    public const INVALID_DIGITAL_SIGNATURE = '79';
    public const STALE_DATED_TRANSACTION = '80';

    public const INFORMATION_NOT_ON_FILE = '88';
    public const CVV_VERIFICATION_FAILED = '89';
    public const CUTOFF_IS_IN_PROGRESS = '90';
    public const ISSUER_OR_SWITCH_IS_INOPERATIVE = '91';
    public const FINANCIAL_INSTITUTION_OR_INTERMEDIATE_NETWORK_UNKNOWN_FOR_ROUTING = '92';
    public const TRANSACTION_CANNOT_BE_COMPLETED_VIOLATION_OF_LAW = '93';
    public const DUPLICATION_TRANSACTION = '94';
    public const RECONCILIATION_ERROR = '95';
    public const SYSTEM_MALFUNCTION = '96';

    public const EXPIRATION_DATE_MISMATCH = 'S9';
    public const INACTIVE_CARD = 'SA';
    public const EXPIRATION_DATE_MISMATCH_CARD_PICKUP = 'SB';
    public const ITEM_SUSPECTED_FOR_STOP_PAY = 'SC';
    public const ACCOUNT_CLOSED = 'SD';
    public const INELIGIBLE_ACCOUNT = 'SE';

    public const LOST_CARD = 'T3';
    public const CLOSED_ACCOUNT = 'T4';
    public const DORMANT_ACCOUNT = 'T5';

    public const INVALID_CURRENCY = 'XC';
    public const PENDING_SESSION = '?-';

    public const APPROVED_REASON_CODES = [
        self::APPROVED_TRANSACTION,
        self::HONOR_WITH_IDENTIFICATION,
        self::APPROVED_PARTIAL_AMOUNT,
        self::APPROVED_VIP,
        self::APPROVED_UPDATE_TRACK_3,
        self::COMPLETED_PARTIAL_REVERSAL,
    ];
}
