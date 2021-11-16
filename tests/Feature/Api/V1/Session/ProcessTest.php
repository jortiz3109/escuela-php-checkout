<?php

namespace Tests\Feature\Api\V1\Session;

use App\Constants\ReasonCodes;
use App\Models\PaymentMethod;
use App\Models\Session;
use App\Models\Transaction;
use Database\Seeders\PaymentMethodSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class ProcessTest extends TestCase
{
    use RefreshDatabase;

    private $session;
    private array $transactionData;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(PaymentMethodSeeder::class);

        $this->session = Session::factory()->create();

        $this->transactionData = [
            'payer' => [
                'name' => 'Pepito',
                'surname' => 'Perez',
                'documentType' => 'CC',
                'document' => '123243564',
                'email' => 'test@example.com',
                'mobile' => '3002344352',
            ],
            'instrument' => [
                'paymentMethodId' => PaymentMethod::first()->id,
                'card' => [
                    'number' => '4110760000000008',
                    'cvv' => '123',
                ],
            ],
        ];
    }

    public function testItCanProcessASession(): void
    {
        $this->request($this->transactionData)->assertSuccessful();
    }

    public function testItCanCreateATransaction(): void
    {
        $this->request($this->transactionData);

        $this->assertDatabaseCount('transactions', 1);
        $this->assertCount(1, $this->session->transactions);
    }

    public function testItCanApprovedATransaction()
    {
        $response = $this->request($this->transactionData);

        $response->assertJson(
            fn(AssertableJson $json) => $json->has(
                'session',
                fn (AssertableJson $json) => $json->has(
                    'status',
                    fn(AssertableJson $json) => $json
                        ->where('status', Session::STATUS_APPROVED)
                        ->where('reason', ReasonCodes::APPROVED_TRANSACTION)
                        ->where('message', trans('reason_codes.' . ReasonCodes::APPROVED_TRANSACTION))
                        ->where('date', $this->session->created_at->format('c'))
                )
                    ->where('uuid', $this->session->uuid)
                    ->has(
                        'payer',
                        fn(AssertableJson $json) => $json
                            ->where('name', $this->transactionData['payer']['name'])
                            ->where('surname', $this->transactionData['payer']['surname'])
                            ->where('documentType', $this->transactionData['payer']['documentType'])
                            ->where('document', $this->transactionData['payer']['document'])
                            ->where('email', $this->transactionData['payer']['email'])
                            ->where('mobile', $this->transactionData['payer']['mobile'])
                    )
                    ->has(
                        'buyer',
                        fn(AssertableJson $json) => $json
                            ->where('name', $this->session->buyer->name)
                            ->where('surname', $this->session->buyer->surname)
                            ->where('documentType', $this->session->buyer->document_type)
                            ->where('document', $this->session->buyer->document_number)
                            ->where('email', $this->session->buyer->email)
                            ->where('mobile', $this->session->buyer->mobile)
                    )
                    ->has(
                        'payment',
                        fn(AssertableJson $json) => $json
                            ->has(
                                'status',
                                fn(AssertableJson $json) => $json
                                    ->where('status', Transaction::STATUS_APPROVED)
                                    ->where('reason', ReasonCodes::APPROVED_TRANSACTION)
                                    ->where('message', trans('reason_codes.' . ReasonCodes::APPROVED_TRANSACTION))
                                    ->where('date', date('c'))
                            )->where('reference', $this->session->reference)
                            ->where('description', $this->session->description)
                            ->has(
                                'amount',
                                fn(AssertableJson $json) => $json
                                    ->where('currency', $this->session->currency->alphabetic_code)
                                    ->where('total', $this->session->total_amount)
                            )->where(
                                'paymentMethod',
                                PaymentMethod::find($this->transactionData['instrument']['paymentMethodId'])->name
                            )->where(
                                'card',
                                '411076******0008'
                            )->has('receipt')->has('authorization')
                    )
                    ->where('ipAddress', $this->session->ip_address)
                    ->where('userAgent', $this->session->user_agent)
            )
        );
    }

    protected function request(array $data = []): TestResponse
    {
        return $this->postJson('/api/v1/session/' . $this->session->uuid . '/process', $data);
    }
}
