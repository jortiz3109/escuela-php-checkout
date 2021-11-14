<?php

namespace App\Constants;

class ReasonCodes
{
    const APPROVED_TRANSACTION = '00';

    const INVALID_MERCHANT = '03';

    const DO_NOT_HONOR = '05';
    const ERROR = '06';

    const HONOR_WITH_IDENTIFICATION = '08';
    const REQUEST_IN_PROGRESS = '09';
    const APPROVED_PARTIAL_AMOUNT = '10';
    const APPROVED_VIP = '11';
    const INVALID_TRANSACTION = '12';
    const INVALID_AMOUNT = '13';
    const INVALID_CARD_NUMBER = '14';
    const NO_SUCH_ISSUER = '15';
    const APPROVED_UPDATE_TRACK_3 = '16';
    const CUSTOMER_CANCELLATION_REVERSAL = '17';
    const CUSTOMER_DISPUTE_CHARGEBACK = '18';
    const RE_ENTER_TRANSACTION = '19';
    const INVALID_RESPONSE = '20';
    const NO_ACTION_TAKEN_REVERSAL = '21';
    const SUSPECTED_MALFUNCTION_REVERSAL = '22';
    const UNACCEPTABLE_TRANSACTION_FEE = '23';

    const FORMAT_ERROR = '30';
    const BANK_NOT_SUPPORTED_BY_SWITCH = '31';
    const COMPLETED_PARTIAL_REVERSAL = '32';

    const NO_CREDIT_ACCOUNT = '39';
    const REQUESTED_FUNCTION_NOT_SUPPORTED = '40';

    const NO_UNIVERSAL_ACCOUNT = '42';

    const INSUFFICIENT_FUNDS = '51';
    const NO_CHECKING_ACCOUNT = '52';
    const NO_SAVINGS_ACCOUNT = '53';
    const EXPIRED_CARD = '54';
    const INCORRECT_PIN = '55';
    const NO_CARD_RECORD = '56';
    const TRANSACTION_NOT_PERMITTED_TO_CARDHOLDER = '57';
    const TRANSACTION_NOT_PERMITTED_TO_TERMINAL = '58';
    const SUSPECTED_FRAUD = '59';
    const CARD_ACEPTOR_CONTACT_ACQUIRER = '60';
    const EXCEEDED_WITHDRAWAL_AMOUNT_LIMIT = '61';
    const RESTRICTED_CARD = '62';
    const SECURITY_VIOLATION = '63';
    const ORIGINAL_AMOUNT_INCORRECT_REVERSAL = '64';
    const EXCEEDED_WITHDRAWAL_FREQUENCY_LIMIT = '65';
    const CARD_ACEPTOR_CALL_ACQUIRER_SECURITY = '66';
    const HARD_CAPTURE_PICK_UP = '67';
    const RESPONSE_RECEIVED_TOO_LATE_REVERSAL = '68';

    const ALLOWED_PIN_TRIES_EXCEEDED = '75';
    const KEY_SYNCHRONIZATION_ERROR = '76';

    const CUSTOMER_NOT_ELEGIBLE_FOR_POS = '78';
    const INVALID_DIGITAL_SIGNATURE = '79';
    const STALE_DATED_TRANSACTION = '80';

    const INFORMATION_NOT_ON_FILE = '88';
    const CVV_VERIFICATION_FAILED = '89';
    const CUTOFF_IS_IN_PROGRESS = '90';
    const ISSUER_OR_SWITCH_IS_INOPERATIVE = '91';
    const FINANCIAL_INSTITUTION_OR_INTERMEDIATE_NETWORK_UNKNOWN_FOR_ROUTING = '92';
    const TRANSACTION_CANNOT_BE_COMPLETED_VIOLATION_OF_LAW = '93';
    const DUPLICATION_TRANSACTION = '94';
    const RECONCILIATION_ERROR = '95';
    const SYSTEM_MALFUNCTION = '96';

    const EXPIRATION_DATE_MISMATCH = 'S9';
    const INACTIVE_CARD = 'SA';
    const EXPIRATION_DATE_MISMATCH_CARD_PICKUP = 'SB';
    const ITEM_SUSPECTED_FOR_STOP_PAY = 'SC';
    const ACCOUNT_CLOSED = 'SD';
    const INELIGIBLE_ACCOUNT = 'SE';

    const LOST_CARD = 'T3';
    const CLOSED_ACCOUNT = 'T4';
    const DORMANT_ACCOUNT = 'T5';

    const INVALID_CURRENCY = 'XC';

    const APPROVED_REASON_CODES = [
        self::APPROVED_TRANSACTION,
        self::HONOR_WITH_IDENTIFICATION,
        self::APPROVED_PARTIAL_AMOUNT,
        self::APPROVED_VIP,
        self::APPROVED_UPDATE_TRACK_3,
        self::COMPLETED_PARTIAL_REVERSAL
    ];
}
