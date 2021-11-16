<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\StoreTransactionAction;
use App\Contracts\GatewayContract;
use App\Http\Controllers\Controller;
use App\Http\Resources\SessionResource;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function process(Session $session, Request $request, GatewayContract $gateway, StoreTransactionAction $action)
    {
        $transaction = $action->execute($session, $request);
        $gateway->process($transaction);

        return new SessionResource($transaction->session);
    }
}
