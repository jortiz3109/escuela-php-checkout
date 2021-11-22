<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\StoreTransactionAction;
use App\Contracts\GatewayContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProcessSessionRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Session;

class TransactionController extends Controller
{
    private GatewayContract $gateway;

    public function __construct(GatewayContract $gateway)
    {
        $this->gateway = $gateway;
    }

    public function process(Session $session, ProcessSessionRequest $request, StoreTransactionAction $storeTransactionAction): TransactionResource
    {
        $request->validated();
        $transaction = $storeTransactionAction->execute($session, $request);
        $this->gateway->process($transaction);

        return new TransactionResource($transaction);
    }
}
