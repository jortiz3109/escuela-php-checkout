<?php

namespace App\Http\Sanctum;

use App\Models\Token;
use Carbon\Carbon;

class ValidateExpiration
{
    public function __invoke(Token $accessToken, bool $isValid)
    {
        return $isValid && (!$accessToken->expiration || Carbon::now()->lessThanOrEqualTo($accessToken->expiration));
    }
}
