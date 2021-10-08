<?php

namespace Tests\Feature\Session;

use App\Models\Session;
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

        $response->assertViewIs('payment');
        $response->assertSeeText('Payments');
    }
}
