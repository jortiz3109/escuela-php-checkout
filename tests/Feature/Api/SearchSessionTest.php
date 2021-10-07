<?php

namespace Tests\Feature\Api;

use App\Models\Merchant;
use App\Models\Session;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SearchSessionTest extends TestCase
{
    use RefreshDatabase;

    public function testItAccessSearchEndpoint()
    {
        $merchant = Merchant::factory()
            ->has(Session::factory())
            ->create();

        $session = $merchant->sessions->first();

        $response = $this->getJson("/api/{$merchant->uuid}/search/{$session->uuid}");

        $response->assertOk();
    }

    public function testResponseIsJson()
    {
        $merchant = Merchant::factory()
            ->has(Session::factory())
            ->create();

        $session = $merchant->sessions->first();

        $response = $this->getJson("/api/{$merchant->uuid}/search/{$session->uuid}");

        $response->assertHeader('content-type', 'application/json');
    }

    /*public function testItReturnAnArrayOfData()
    {
        $response = $this->getJson('/api/{$merchant->uuid}/show/{$session->uuid}');

        $response->assertJson(fn (AssertableJson $json) => );

    }*/
}
