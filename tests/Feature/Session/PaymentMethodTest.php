<?php

namespace Tests\Feature\Session;

use App\Models\Merchant;
use App\Models\PaymentMethod;
use App\Models\Session;
use Database\Seeders\PaymentMethodSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaymentMethodTest extends TestCase
{
    use RefreshDatabase;

    public function testSessionPaymentEndpointAvailable()
    {
        $session = Session::factory()->create();

        $response = $this->get("/{$session->uuid}/payment");

        $response->assertOk();
    }

    public function testItCanSeeSessionPaymentView()
    {
        $session = Session::factory()->create();

        $response = $this->get("/{$session->uuid}/payment");

        $response->assertViewIs('session.payment');
        $response->assertSeeText('Payments');
    }

    public function testItCanListMerchantPaymentMethods()
    {
        $this->seed(PaymentMethodSeeder::class);
        $paymentMethod = PaymentMethod::first();

        $merchant = Merchant::factory()
            ->has(Session::factory())
            ->hasAttached(PaymentMethod::first())
            ->create();

        $session = $merchant->sessions->first();

        $response = $this->get("/{$session->uuid}/payment");

        $response->assertSeeText($paymentMethod->name);
        $response->assertDontSeeText(PaymentMethod::where('name', '!=', $paymentMethod->name)->first()->name);
    }
}
