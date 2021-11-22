<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('pan');
            $table->foreignId('payment_method_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
