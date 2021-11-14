<?php

namespace Tests\Unit\Mock;

use App\Constants\ReasonCodes;
use App\Mock\TestingCard;
use PHPUnit\Framework\TestCase;

class TestingCardTest extends TestCase
{
    public function testItCanCreateATestingCard(): void
    {
        $testingCard = new TestingCard('4012888888881881', [
            'code' => ReasonCodes::APPROVED_TRANSACTION,
            'cvv' => '917',
            'expiration' => '11/28',
            'pin' => '1234',
            'currency' => 'USD',
            'maxAmount' => 125.50
        ]);

        $this->assertEquals('4012888888881881', $testingCard->number());
        $this->assertEquals('917', $testingCard->cvv());
        $this->assertEquals('11/28', $testingCard->expiration());
        $this->assertEquals('1234', $testingCard->pin());
        $this->assertEquals('USD', $testingCard->currency());
        $this->assertEquals(125.5, $testingCard->maxAmount());
    }

    public function testItCanValidateACardCvv(): void
    {
        $testingCard = new TestingCard('4012888888881881', [
            'code' => ReasonCodes::APPROVED_TRANSACTION,
            'cvv' => '917',
        ]);

        $this->assertEquals(ReasonCodes::APPROVED_TRANSACTION, $testingCard->validate(['cvv' => '917']));
        $this->assertEquals(ReasonCodes::CVV_VERIFICATION_FAILED, $testingCard->validate(['cvv' => '888']));
        $this->assertEquals(ReasonCodes::CVV_VERIFICATION_FAILED, $testingCard->validate([]));
    }

    public function testItCanValidateACardExpiration(): void
    {
        $testingCard = new TestingCard('4012888888881881', [
            'code' => ReasonCodes::APPROVED_VIP,
            'expiration' => '11/28',
        ]);

        $this->assertEquals(ReasonCodes::APPROVED_VIP, $testingCard->validate(['expiration' => '11/28']));
        $this->assertEquals(ReasonCodes::EXPIRATION_DATE_MISMATCH, $testingCard->validate(['expiration' => '12/28']));
        $this->assertEquals(ReasonCodes::EXPIRATION_DATE_MISMATCH, $testingCard->validate([]));
    }

    public function testItCanValidateACardPin(): void
    {
        $testingCard = new TestingCard('4012888888881881', [
            'code' => ReasonCodes::DO_NOT_HONOR,
            'pin' => '1234',
        ]);

        $this->assertEquals(ReasonCodes::DO_NOT_HONOR, $testingCard->validate(['pin' => '1234']));
        $this->assertEquals(ReasonCodes::INCORRECT_PIN, $testingCard->validate(['pin' => '8888']));
        $this->assertEquals(ReasonCodes::INCORRECT_PIN, $testingCard->validate([]));
    }

    public function testItCanValidateACardCurrency(): void
    {
        $testingCard = new TestingCard('4012888888881881', [
            'code' => ReasonCodes::INVALID_RESPONSE,
            'currency' => 'USD',
        ]);

        $this->assertEquals(ReasonCodes::INVALID_RESPONSE, $testingCard->validate(['currency' => 'USD']));
        $this->assertEquals(ReasonCodes::INVALID_CURRENCY, $testingCard->validate(['currency' => 'COP']));
        $this->assertEquals(ReasonCodes::INVALID_CURRENCY, $testingCard->validate([]));
    }

    public function testItCanValidateACardMaxAmount(): void
    {
        $testingCard = new TestingCard('4012888888881881', [
            'code' => ReasonCodes::APPROVED_PARTIAL_AMOUNT,
            'maxAmount' => 200,
        ]);

        $this->assertEquals(ReasonCodes::APPROVED_PARTIAL_AMOUNT, $testingCard->validate(['amount' => 100]));
        $this->assertEquals(ReasonCodes::APPROVED_PARTIAL_AMOUNT, $testingCard->validate(['amount' => 200]));
        $this->assertEquals(ReasonCodes::INVALID_AMOUNT, $testingCard->validate(['amount' => 300]));
        $this->assertEquals(ReasonCodes::INVALID_AMOUNT, $testingCard->validate([]));
    }
}
