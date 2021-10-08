<?php

namespace Tests\Feature;

use App\Models\Session;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function testSessionEndpointAvailable()
    {
        // Arrange
        $session = Session::factory()->create();

        // Act
        $response = $this->get("/{$session->id}/payment");

        // Assert
        $response->assertOk();
    }

    public function testL()
    {
        // Arrange
        $session = Session::factory()->create();

        // Act
        $response = $this->get("/{$session->id}/payment");

        // Assert
        $response->assertViewIs('payment');
//        $response->assertSee('payment');
    }
}
