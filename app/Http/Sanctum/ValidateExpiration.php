<?php

namespace App\Http\Sanctum;

use App\Models\Token;
use Carbon\Carbon;

class ValidateExpiration
{
    public function __invoke(Token $accessToken, bool $is_valid) {
        $expired = $accessToken->expiration && Carbon::now()->greaterThan($accessToken->expiration);

        return $is_valid && !$expired;
    }
}
