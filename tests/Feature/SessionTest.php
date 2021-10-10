<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class SessionTest extends TestCase
{
    public function getBasePath(): string
    {
        return '/api/v1/session';
    }

    public function getHeaders(): array
    {
        return [
            'accept' => 'application/json',
            'content-type' => 'application/json'
        ];
    }

    public function getPayload(): array
    {
        return [
            'payment' => [
                'reference' => 'adasd',
                'description' => '',
                'amount' => [
                    'currency' => 'COP',
                    'total' => 10000
                ]
            ],
            'expiration' => Carbon::now()->addMinutes(10),
            'return_url' => '',
            'ip_address' =>  '',
            'user_agent' => '',
        ];
    }

    public function testRetrieveUnprocessableEntity()
    {
        //malformed payload
        $request = [
            'total_amount' => 5000
        ];
        $response = $this->post($this->getBasePath(), $request, $this->getHeaders());

        $response->assertStatus(422);
    }

    public function testItCanValidateReferenceField()
    {
        $request = [
            'total_amount' => 5000
        ];
        $response = $this->post($this->getBasePath(), $request, $this->getHeaders());
        $response->assertInvalid([
            'payment.reference' => 'The payment.reference field is required.'
        ]);
    }

}
