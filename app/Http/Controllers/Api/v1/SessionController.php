<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentMethodCollection;
use App\Models\Session;

class SessionController extends Controller
{
    public function paymentMethods(Session $session): PaymentMethodCollection
    {
        return new PaymentMethodCollection($session->merchant->paymentMethods);
    }
}
