<?php

namespace Tests\Feature\Session;

use App\Models\Session;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var Session
     */
    private $session;

    protected function setUp(): void
    {
        parent::setUp();

        $this->session = Session::factory()->create();
    }

    public function testItCanGetPaymentInterface()
    {
        $response = $this->getSessionPaymentInterface();

        $response->assertOk();
    }

    public function testSessionPaymentIsAView()
    {
        $response = $this->getSessionPaymentInterface();

        $response->assertViewIs('session.payment');
    }

    protected function getSessionPaymentInterface(?Session $session = null): TestResponse
    {
        $session ??= $this->session;
        return $this->get("/session/{$session->uuid}");
    }
}
