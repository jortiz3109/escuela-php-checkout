<?php

namespace App\Providers;

use App\Contracts\GatewayContract;
use App\Mock\MockHandler;
use App\Services\Gateway;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        GatewayContract::class => Gateway::class,
    ];

    public function register(): void
    {
        $this->app->singleton(ClientInterface::class, function () {
            return new Client([
                'handler' => new MockHandler(),
            ]);
        });
    }

    public function boot(): void
    {
        //
    }
}
