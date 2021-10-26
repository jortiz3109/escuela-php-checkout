<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyMerchantTable extends Migration
{
    public function up(): void
    {
        Schema::create('currency_merchant', function (Blueprint $table) {
            $table->foreignId('merchant_id');
            $table->foreignId('currency_id');
            $table->primary(['merchant_id', 'currency_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('currency_merchant');
    }
}
