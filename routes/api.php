<?php

use App\Http\Controllers\Api\V1\PaymentMethodController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/{merchant:uuid}/search/{session:uuid}', [SessionController::class, 'search']);

Route::prefix('v1')->group(function () {
    Route::get('session/{session:uuid}/payment-methods', [PaymentMethodController::class, 'discover'])->name('api.v1.paymentMethods.discover');
});
