<?php

use App\Models\Session;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('merchant_id');
            $table->foreignId('buyer_id')->nullable()->constrained('persons');
            $table->enum('status', Session::STATUSES);
            $table->string('reference', 32);
            $table->string('description', 255);
            $table->foreignId('currency_id');
            $table->unsignedBigInteger('total_amount');
            $table->dateTime('date');
            $table->dateTime('expiration');
            $table->string('ip_address', 20);
            $table->string('user_agent', 120);
            $table->string('return_url', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
