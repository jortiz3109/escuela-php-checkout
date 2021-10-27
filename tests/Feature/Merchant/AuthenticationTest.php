<?php

namespace Tests\Feature\Merchant;

use App\Models\Merchant;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
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

        $this->token = $this->merchant->createToken('test');
    }

    public function testItCanAccessEndpointAuthenticated(): void
    {
        Sanctum::actingAs($this->merchant);

        $response = $this->postJson(self::ENDPOINT);

        $response->assertStatus(Response::HTTP_OK);
        $this->assertEquals($this->merchant->id, Auth::user()->id);
    }

    public function testItCannotAccessEndpointWithoutToken(): void
    {
        $this->postJson(self::ENDPOINT)->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testItCanAccessEndpointWithValidToken()
    {
        $response = $this->postJson(self::ENDPOINT, [], [
            'Authorization' => 'Bearer ' . $this->token->plainTextToken,
        ]);

        $response->assertStatus(Response::HTTP_OK);
        $this->assertEquals($this->merchant->id, Auth::user()->id);
    }

    public function testItCannotAccessEndpointWithInvalidToken()
    {
        $response = $this->postJson(self::ENDPOINT, [], [
            'Authorization' => 'Bearer ' . $this->token->plainTextToken . '+='
        ]);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testItCannotAccessEndpointWithRevokedToken()
    {
        $plainTextToken = $this->token->plainTextToken;

        $this->merchant->tokens()->where('name', 'test')->delete();

        $response = $this->postJson(self::ENDPOINT, [], [
            'Authorization' => 'Bearer ' . $plainTextToken,
        ]);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testItCanAccessEndpointWithNotExpiredToken()
    {
        $this->token->accessToken->expiration = Carbon::now()->addHour();
        $this->token->accessToken->save();

        $response = $this->postJson(self::ENDPOINT, [], [
            'Authorization' => 'Bearer ' . $this->token->plainTextToken,
        ]);

        $response->assertStatus(Response::HTTP_OK);
        $this->assertEquals($this->merchant->id, Auth::user()->id);
    }

    public function testItCannotAccessEndpointWithExpiredToken()
    {
        $this->token->accessToken->expiration = Carbon::now()->subHour();
        $this->token->accessToken->save();

        $this->merchant->tokens()->where('name', 'test')->delete();

        $response = $this->postJson(self::ENDPOINT, [], [
            'Authorization' => 'Bearer ' . $this->token->plainTextToken,
        ]);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }
}
