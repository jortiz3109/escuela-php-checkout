<?php

namespace Tests\Feature\Api\V1\Session;

use App\Models\Session;
use Database\Seeders\PaymentMethodSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
                'mobile' => '3002344352'
            ],
            'instrument' => [
                'paymentMethodId' => 1,
                'card' => [
                    'number' => '4110760000000008',
                    'cvv' => '123'
                ]
            ]
        ];
    }

    public function testItCanProcessASession(): void
    {
        $this->request($this->transactionData)->assertSuccessful();
    }

    protected function request(array $data = []): TestResponse
    {
        return $this->postJson('/api/v1/session/' . $this->session->uuid . '/process', $data);
    }
}
