<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokensTable extends Migration
{
    public function up(): void
    {
        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            $table->string('token', 64)->unique();
            $table->foreignId('merchant_id');
            $table->timestamp('expiration');
            $table->boolean('active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tokens');
    }
}
