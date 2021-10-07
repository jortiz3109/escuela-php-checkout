<?php

namespace Tests\Feature\Api;

use App\Models\Merchant;
use App\Models\Session;
use Illuminate\Foundation\Testing\RefreshDatabase;
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

    public function testItAccessSearchEndpoint()
    {
        $response = $this->search($this->merchant, $this->session);

        $response->assertOk();
    }

    public function testResponseIsJson()
    {
        $response = $this->search($this->merchant, $this->session);

        $response->assertHeader('content-type', 'application/json');
    }

    public function testItCanSeeSearchedSessionData()
    {
        $response = $this->search($this->merchant, $this->session);

        self::assertEquals($this->session->uuid, $response['requestId']);

        self::assertEquals($this->session->status, $response['status']['status']);
        self::assertEquals('00', $response['status']['reason']);
        self::assertEquals('Approved', $response['status']['message']);
        self::assertEquals($this->session->date, $response['status']['date']);

        self::assertNotEmpty($response['payment']['status']);
        self::assertEquals($this->session->total_amount, $response['payment']['amount']['total']);
        self::assertEquals($this->session->currency->alphabetic_code, $response['payment']['amount']['currency']);
        self::assertEquals($this->session->reference, $response['payment']['reference']);
        self::assertNull($response['payment']['authorization']);
        self::assertNull($response['payment']['receipt']);
    }

    public function testItCannotSearchOtherMerchantSession()
    {
        $otherSession = Session::factory()->create();

        self::assertNotEquals($otherSession->merchant->id, $this->merchant->id);

        $response = $this->search($this->merchant, $otherSession);

        $response->assertStatus(404);
    }

    protected function search(Merchant $merchant, Session $session)
    {
        return $this->getJson("/api/{$merchant->uuid}/search/{$session->uuid}");
    }
}
