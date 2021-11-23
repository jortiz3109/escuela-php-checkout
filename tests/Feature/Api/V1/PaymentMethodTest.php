<?php

namespace Tests\Feature\Api\V1;

use App\Models\PaymentMethod;
use App\Models\Session;
use Database\Seeders\PaymentMethodSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class PaymentMethodTest extends TestCase
{
    use RefreshDatabase;

    private $session;

    protected function request(): TestResponse
    {
        return $this->get('/api/v1/session/' . $this->session->uuid . '/payment-methods');
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(PaymentMethodSeeder::class);

        $this->session = Session::factory()->create();

        $this->session->merchant->paymentMethods()->attach(PaymentMethod::first());
    }

    public function testItCanRequestPaymentMethods(): void
    {
        $response = $this->request();
        $response->assertOk();
    }

    public function testItReturnsPaymentMethodsData(): void
    {
        $response = $this->request();
        $paymentMethod = PaymentMethod::first();

        $response->assertJson(
            fn (AssertableJson $json) => $json->has('meta')
                ->has('data', 1)
                ->has(
                    'data.DEBIT.0',
                    fn (AssertableJson $json) => $json
                    ->where('id', $paymentMethod->id)
                    ->where('name', $paymentMethod->name)
                    ->where('logo', $paymentMethod->logo)
                )
        );
    }
}
