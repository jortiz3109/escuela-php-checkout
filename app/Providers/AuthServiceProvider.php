<?php

namespace App\Providers;

use App\Models\Token;
use Carbon\Carbon;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Sanctum::usePersonalAccessTokenModel(Token::class);

        Sanctum::authenticateAccessTokensUsing(
            static function (Token $accessToken, bool $is_valid) {
                $expired = $accessToken->expiration && Carbon::now()->greaterThan($accessToken->expiration);

                return $is_valid && !$expired;
            }
        );
    }
}
