<?php

namespace App\Http\Controllers;

use App\Http\Resources\SessionResource;
use App\Models\Merchant;
use App\Models\Session;
use Illuminate\Http\Response;

class SessionController extends Controller
{
    public function search(Merchant $merchant, Session $session): array
    {
        return (new SessionResource($session))->toArray(request());
    }

    public function payment(Session $session): Response
    {
        return response()->view('session.payment', compact('session'));
    }
}
