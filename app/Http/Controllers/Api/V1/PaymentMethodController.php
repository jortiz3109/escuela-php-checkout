<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentMethodCollection;
use App\Models\Session;

class PaymentMethodController extends Controller
{
    public function discover(Session $session): PaymentMethodCollection
    {
        return PaymentMethodCollection::make($session->merchant->paymentMethods);
    }
}
