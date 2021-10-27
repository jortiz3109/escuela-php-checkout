<?php

use App\Http\Controllers\Api\V1\PaymentMethodController;
use Illuminate\Support\Facades\Route;

 Route::get('session/{session:uuid}/payment-methods', [PaymentMethodController::class, 'discover'])->name('api.v1.paymentMethods.discover');
