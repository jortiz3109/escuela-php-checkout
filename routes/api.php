<?php

use App\Http\Controllers\Api\V1\PaymentMethodController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('session/{session:uuid}/payment-methods', [PaymentMethodController::class, 'discover'])->name('api.v1.paymentMethods.discover');

    // TODO: This is just a mock up of the route
    Route::post('session/{session:uuid}/card-settings', function (Request $request) {
        if ($request->input('data.cardNumber') === '4111111111111111') {
            return [
            'franchise' => 'visa',
            'category' => 'CREDIT',
            'settings' => [
                'expiration' => true,
                'cardholderName' => true,
                'pin' => 4,
                'cvv' => 3,
            ],
        ];
        }

        return [
            'data' => [
                'message' => 'Invalid card data',
                'errors' => [
                    'cardNumber' => [
                        'The card number is invalid',
                    ],
                ],
            ],
        ];
    });
});
