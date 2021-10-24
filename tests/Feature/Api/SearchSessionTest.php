<?php

namespace Tests\Feature\Api;

use App\Models\Merchant;
use App\Models\Session;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class SearchSessionTest extends TestCase
{
    use RefreshDatabase;

    private Merchant $merchant;
    private Session $session;

    protected function setUp(): void
    {
        parent::setUp();

        $this->merchant = Merchant::factory()
            ->has(Session::factory())
            ->create();

        $this->session = $this->merchant->sessions->first();
    }

    public function testItAccessSearchEndpoint(): void
    {
        $response = $this->search($this->merchant, $this->session);

        $response->assertOk();
    }

    public function testResponseIsJson(): void
    {
        $response = $this->search($this->merchant, $this->session);

        $response->assertHeader('content-type', 'application/json');
    }

    public function testItCanSeeSearchedSessionData(): void
    {
        $response = $this->search($this->merchant, $this->session);

        $response->assertJson(
            fn (assertableJson $json) => $json

                ->where('requestId', $this->session->uuid)

                ->where('status.reason', $this->session->reason)
                ->where('status.status', $this->session->status)
                ->where('status.message', $this->session->message)
                ->where('status.date', $this->session->date)

                ->has('payment.status.status')
                ->where('payment.amount.total', $this->session->total_amount)
                ->where('payment.amount.currency', $this->session->currency->alphabetic_code)
                ->where('payment.reference', $this->session->reference)
                ->has('payment.authorization')
                ->has('payment.receipt')
        );
    }

    public function testItCannotSearchOtherMerchantSession(): void
    {
        $otherSession = Session::factory()->create();

        $this->assertNotEquals($otherSession->merchant->id, $this->merchant->id);

        $response = $this->search($this->merchant, $otherSession);

        $response->assertStatus(404);
    }

    private function search(Merchant $merchant, Session $session): \Illuminate\Testing\TestResponse
    {
        return $this->getJson("/api/{$merchant->uuid}/search/{$session->uuid}");
    }
}
