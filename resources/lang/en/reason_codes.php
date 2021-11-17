<?php

use App\Constants\ReasonCodes;

return [
    ReasonCodes::APPROVED_TRANSACTION => 'Approved',

    ReasonCodes::INVALID_MERCHANT => 'Invalid merchant',

    ReasonCodes::DO_NOT_HONOR => 'Client canceled',
    ReasonCodes::ERROR => 'Error',

    ReasonCodes::REQUEST_IN_PROGRESS => 'In process',
    ReasonCodes::APPROVED_PARTIAL_AMOUNT => 'Approved partial',
    ReasonCodes::APPROVED_VIP => 'Approved VIP',
    ReasonCodes::INVALID_TRANSACTION => 'Invalid transaction',
    ReasonCodes::INVALID_AMOUNT => 'Invalid amount',
    ReasonCodes::INVALID_CARD_NUMBER => 'Invalid card number',

    ReasonCodes::INVALID_RESPONSE => 'Invalid response',

    ReasonCodes::FORMAT_ERROR => 'Format error',

    ReasonCodes::REQUESTED_FUNCTION_NOT_SUPPORTED => 'Function not supported',

    ReasonCodes::NO_UNIVERSAL_ACCOUNT => 'No universal account',

    ReasonCodes::INSUFFICIENT_FUNDS => 'Insufficient funds',
    ReasonCodes::NO_CHECKING_ACCOUNT => 'No checking account',
    ReasonCodes::NO_SAVINGS_ACCOUNT => 'No savings account',
    ReasonCodes::EXPIRED_CARD => 'Expired card',
    ReasonCodes::INCORRECT_PIN => 'Incorrect pin',

    ReasonCodes::TRANSACTION_NOT_PERMITTED_TO_CARDHOLDER => 'Transaction not permitted to cardholder',
    ReasonCodes::TRANSACTION_NOT_PERMITTED_TO_TERMINAL => 'Transaction not permitted to terminal',
    ReasonCodes::SUSPECTED_FRAUD => 'Suspected fraud',

    ReasonCodes::RESTRICTED_CARD => 'Restricted card',
    ReasonCodes::SECURITY_VIOLATION => 'Security violation',

    ReasonCodes::ALLOWED_PIN_TRIES_EXCEEDED => 'Allowed pin tries exceeded',

    ReasonCodes::CVV_VERIFICATION_FAILED => 'Cvv verification failed',

    ReasonCodes::ISSUER_OR_SWITCH_IS_INOPERATIVE => 'Issuer of switch is inoperative',

    ReasonCodes::LAW_VIOLATION => 'Transaction cannot be completed due law violation',
    ReasonCodes::DUPLICATION_TRANSACTION => 'Duplicated transaction',

    ReasonCodes::SYSTEM_MALFUNCTION => 'System malfunction',

    ReasonCodes::EXPIRATION_DATE_MISMATCH => 'Expiration date mismatch',
    ReasonCodes::INACTIVE_CARD => 'Inactive card',

    ReasonCodes::ACCOUNT_CLOSED => 'Account closed',
    ReasonCodes::INELIGIBLE_ACCOUNT => 'Ineligible account',

    ReasonCodes::LOST_CARD => 'Lost card',
    ReasonCodes::CLOSED_ACCOUNT => 'Closed account',

    ReasonCodes::INVALID_CURRENCY => 'Invalid currency',
    ReasonCodes::PENDING_SESSION => 'Pending',
    ReasonCodes::EXPIRED_SESSION => 'Expired',
];
