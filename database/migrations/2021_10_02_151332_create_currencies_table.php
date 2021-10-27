<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    public function up(): void
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 80);
            $table->unsignedTinyInteger('minor_unit');
            $table->char('alphabetic_code', 3)->unique();
            $table->char('numeric_code', 3)->unique();
            $table->string('symbol', 3)->default('$');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
}
