<?php

namespace Tests\Feature\Session;

use App\Models\Merchant;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    const ENDPOINT = '/testing/session';

    /**
     * @var Merchant
     */
    private $merchant;
    private $token;

    protected function setUp(): void
    {
        parent::setUp();

        $this->merchant = Merchant::factory()->create();

        $this->token = $this->merchant->createToken('test')->plainTextToken;
    }

    public function testItCanAccessEndpointAuthenticated(): void
    {
        Sanctum::actingAs($this->merchant);

        $response = $this->postJson(self::ENDPOINT);

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testItCannotAccessEndpointWithoutToken(): void
    {
        $this->postJson(self::ENDPOINT)->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testItCanAccessEndpointWithValidToken()
    {
        $response = $this->postJson(self::ENDPOINT, [], [
            'Authorization' => 'Bearer ' . $this->token,
        ]);

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testItCannotAccessEndpointWithInvalidToken()
    {
        $response = $this->postJson(self::ENDPOINT, [], [
            'Authorization' => 'Bearer ' . str_replace([1,2,3], 9, $this->token),
        ]);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testItCannotAccessEndpointWithRevokedToken()
    {
        $token = $this->token;

        $this->merchant->tokens()->where('name', 'test')->delete();

        $response = $this->postJson(self::ENDPOINT, [], [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }
}
