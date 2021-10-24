<?php

namespace App\Http\Controllers;

use App\Http\Resources\SessionResource;
use App\Models\Merchant;
use App\Models\Session;

class SessionController extends Controller
{
    public function search(Merchant $merchant, Session $session): array
    {
        return (new SessionResource($session))->toArray(request());
    }
}
