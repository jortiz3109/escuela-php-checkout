<?php

namespace Tests\Unit\Mock;

use App\Constants\ReasonCodes;
use App\Mock\MockHandler;
use App\Models\Transaction;
use Tests\TestCase;

class MockHandlerTest extends TestCase
{
    private MockHandler $gateway;
    private array $transaction;

    protected function setUp(): void
    {
        parent::setUp();

        $this->gateway = new MockHandler();

        $this->transaction = [
            'payer' => [
                'name' => 'Pepito',
                'surname' => 'Jaramillo',
                'documentType' => 'CC',
                'document' => '12323435',
            ],
            'payment' => [
                'amount' => [
                    'currency' => 'USD',
                    'total' => 100,
                ],
            ],
        ];
    }

    public function testItCanApprovedATransaction()
    {
        $this->transaction['instrument']['card'] = [
            'number' => '4110760000000008',
        ];

        $response = $this->gateway->process($this->transaction);

        $this->assertEquals(Transaction::STATUS_APPROVED, $response['status']['status']);
        $this->assertEquals(ReasonCodes::APPROVED_TRANSACTION, $response['status']['reason']);
        $this->assertEquals(trans('reason_codes.' . ReasonCodes::APPROVED_TRANSACTION), $response['status']['message']);
        $this->assertEquals(now()->format('c'), $response['status']['date']);
        $this->assertNotEmpty($response['receipt']);
        $this->assertNotEmpty($response['authorization']);
    }

    public function testItCanApprovedATransactionWithExpirationAndCvv()
    {
        $this->transaction['instrument']['card'] = [
            'number' => '4012888888881881',
            'expiration' => '11/28',
            'cvv' => '917',
        ];

        $response = $this->gateway->process($this->transaction);

        $this->assertEquals(Transaction::STATUS_APPROVED, $response['status']['status']);
        $this->assertEquals(ReasonCodes::APPROVED_TRANSACTION, $response['status']['reason']);
        $this->assertEquals(trans('reason_codes.' . ReasonCodes::APPROVED_TRANSACTION), $response['status']['message']);
        $this->assertEquals(now()->format('c'), $response['status']['date']);
        $this->assertNotEmpty($response['receipt']);
        $this->assertNotEmpty($response['authorization']);
    }

    public function testItCanApprovedATransactionWithMaxAmount()
    {
        $this->transaction['instrument']['card'] = [
            'number' => '4110760000000057',
        ];

        $response = $this->gateway->process($this->transaction);

        $this->assertEquals(Transaction::STATUS_APPROVED, $response['status']['status']);
        $this->assertEquals(ReasonCodes::APPROVED_TRANSACTION, $response['status']['reason']);
        $this->assertEquals(trans('reason_codes.' . ReasonCodes::APPROVED_TRANSACTION), $response['status']['message']);
        $this->assertEquals(now()->format('c'), $response['status']['date']);
        $this->assertNotEmpty($response['receipt']);
        $this->assertNotEmpty($response['authorization']);
    }

    public function testItCanRejectATransaction()
    {
        $this->transaction['instrument']['card'] = [
            'number' => '4110760000000016',
        ];

        $response = $this->gateway->process($this->transaction);

        $this->assertEquals(Transaction::STATUS_REJECTED, $response['status']['status']);
        $this->assertEquals(ReasonCodes::INVALID_TRANSACTION, $response['status']['reason']);
        $this->assertEquals(trans('reason_codes.' . ReasonCodes::INVALID_TRANSACTION), $response['status']['message']);
        $this->assertEquals(now()->format('c'), $response['status']['date']);
        $this->assertNotEmpty($response['receipt']);
        $this->assertEmpty($response['authorization']);
    }

    public function testItCanRejectATransactionWithWrongCvv()
    {
        $this->transaction['instrument']['card'] = [
            'number' => '4012888888881881',
            'expiration' => '11/28',
            'cvv' => '123',
        ];

        $response = $this->gateway->process($this->transaction);

        $this->assertEquals(Transaction::STATUS_REJECTED, $response['status']['status']);
        $this->assertEquals(ReasonCodes::CVV_VERIFICATION_FAILED, $response['status']['reason']);
        $this->assertEquals(trans('reason_codes.' . ReasonCodes::CVV_VERIFICATION_FAILED), $response['status']['message']);
        $this->assertEquals(now()->format('c'), $response['status']['date']);
        $this->assertNotEmpty($response['receipt']);
        $this->assertEmpty($response['authorization']);
    }

    public function testItCanRejectATransactionWithWrongExpiration()
    {
        $this->transaction['instrument']['card'] = [
            'number' => '4012888888881881',
            'expiration' => '02/28',
            'cvv' => '917',
        ];

        $response = $this->gateway->process($this->transaction);

        $this->assertEquals(Transaction::STATUS_REJECTED, $response['status']['status']);
        $this->assertEquals(ReasonCodes::EXPIRATION_DATE_MISMATCH, $response['status']['reason']);
        $this->assertEquals(trans('reason_codes.' . ReasonCodes::EXPIRATION_DATE_MISMATCH), $response['status']['message']);
        $this->assertEquals(now()->format('c'), $response['status']['date']);
        $this->assertNotEmpty($response['receipt']);
        $this->assertEmpty($response['authorization']);
    }

    public function testItCanRejectATransactionWithInvalidAmount()
    {
        $this->transaction['instrument']['card'] = [
            'number' => '4110760000000057',
        ];

        $this->transaction['payment']['amount']['total'] = 300;

        $response = $this->gateway->process($this->transaction);

        $this->assertEquals(Transaction::STATUS_REJECTED, $response['status']['status']);
        $this->assertEquals(ReasonCodes::INVALID_AMOUNT, $response['status']['reason']);
        $this->assertEquals(trans('reason_codes.' . ReasonCodes::INVALID_AMOUNT), $response['status']['message']);
        $this->assertEquals(now()->format('c'), $response['status']['date']);
        $this->assertNotEmpty($response['receipt']);
        $this->assertEmpty($response['authorization']);
    }
}
