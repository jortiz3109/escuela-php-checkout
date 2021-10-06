<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testItFailedCreateSession()
    {
        $request = [
            'total_amount' => 5000
        ];

        $response = $this->post('/api/v1/session', $request);

        $response->assertStatus(422);
    }
}
