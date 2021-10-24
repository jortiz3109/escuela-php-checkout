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

    public function testItCanGetPaymentInterface(): void
    {
        $response = $this->getSessionPaymentInterface();

        $response->assertOk();
    }

    public function testSessionPaymentIsAView(): void
    {
        $response = $this->getSessionPaymentInterface();

        $response->assertViewIs('session.payment');
    }

    public function testItCanSeeSessionData(): void
    {
        $response = $this->getSessionPaymentInterface();

        $response->assertSeeText($this->session->reference);
        $response->assertSeeText($this->session->description);
        $response->assertSeeText($this->session->currency->alphabetic_code);
        $response->assertSeeText($this->session->formattedAmount());
        $response->assertSeeText($this->session->merchant->display_name);
    }

    public function testItCanSeeFormattedTotalAmount(): void
    {
        /** @var Session $session */
        $session = Session::factory()->create([
            'total_amount' => 15450,
        ]);

        $response = $this->getSessionPaymentInterface($session);

        $response->assertSeeText('15,450.00');
    }

    protected function getSessionPaymentInterface(?Session $session = null): TestResponse
    {
        $session ??= $this->session;
        return $this->get("/session/{$session->uuid}");
    }
}
