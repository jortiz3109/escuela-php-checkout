<?php

namespace App\Contracts;

use App\Models\Transaction;

interface GatewayContract
{
    public function process(Transaction $transaction): Transaction;
}
