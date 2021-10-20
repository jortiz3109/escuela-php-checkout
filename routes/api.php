<?php

use App\Http\Controllers\Api\v1\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/v1/session/{session:uuid}/payment-methods', [SessionController::class, 'paymentMethods'])->name('session.paymentMethods');
