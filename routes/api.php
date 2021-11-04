<?php

use App\Http\Controllers\Api\V1\PaymentMethodController;
use App\Http\Controllers\SessionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/{merchant:uuid}/search/{session:uuid}', [SessionController::class, 'search']);

Route::get('/session/{session:uuid}/paymentMethods', function () {
    return response()->json([
        [
            'id' => 1,
            'name' => 'Visa credit',
            'category' => 'credit',
            'logo' => 'https://logos-marcas.com/wp-content/uploads/2020/04/Visa-Emblema.png',
        ],
        [
            'id' => 2,
            'name' => 'Visa debit',
            'category' => 'debit',
            'logo' => 'https://seeklogo.com/images/V/visa-electron-logo-71BEC57E8F-seeklogo.com.png',

        ],
        [
            'id' => 3,
            'name' => 'Mastercard credit',
            'category' => 'credit',
            'logo' => 'https://upload.wikimedia.org/wikipedia/commons/0/04/Mastercard-logo.png',
        ],
        [
            'id' => 4,
            'name' => 'Mastercard debit',
            'category' => 'debit',
            'logo' => 'https://1000marcas.net/wp-content/uploads/2020/07/Maestro-logo-1.png',
        ],
    ]);
});

Route::prefix('v1')->group(function () {
    Route::get('session/{session:uuid}/payment-methods', [PaymentMethodController::class, 'discover'])->name('api.v1.paymentMethods.discover');
});
