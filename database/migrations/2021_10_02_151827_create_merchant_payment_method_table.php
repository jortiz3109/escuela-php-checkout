<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantPaymentMethodTable extends Migration
{
    public function up(): void
    {
        Schema::create('merchant_payment_method', function (Blueprint $table) {
            $table->foreignId('merchant_id');
            $table->foreignId('payment_method_id');
            $table->primary(['merchant_id', 'payment_method_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('merchant_payment_method');
    }
}
