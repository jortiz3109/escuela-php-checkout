<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

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
