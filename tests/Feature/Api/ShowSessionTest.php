<?php

namespace Tests\Feature\Api;

use App\Models\Merchant;
use App\Models\Session;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowSessionTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanShow()
    {
        $this->markTestIncomplete();
        $merchant = Merchant::factory()->create();
        $session = Session::factory()->create();

        $response = $this->getJson('/api/{$merchant->uuid}/show/{$session->uuid}');

        $response->assertOk();
    }

    public function testResponseIsJson()
    {
        $response = $this->getJson('/api/{$merchant->uuid}/show/{$session->uuid}');
        $response->assertHeader('content-type', 'application/json');
    }

    /*public function testItReturnAnArrayOfData()
    {
        $response = $this->getJson('/api/{$merchant->uuid}/show/{$session->uuid}');

        $response->assertJson(fn (AssertableJson $json) => );

    }*/
}
