<?php

use App\Http\Controllers\Api\V1\PaymentMethodController;
use App\Http\Controllers\Api\V1\TransactionController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('session/{session:uuid}/payment-methods', [PaymentMethodController::class, 'discover'])
        ->name('api.v1.paymentMethods.discover');

    Route::post('session/{session:uuid}/process', [TransactionController::class, 'process'])
        ->name('api.v1.session.process');
});
