<?php

use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{session:uuid}/payment', [SessionController::class, 'payment'])->name('payment');
