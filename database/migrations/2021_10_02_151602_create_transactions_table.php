<?php

use App\Models\Transaction;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payer_id')->constrained('persons');
            $table->foreignId('session_id');
            $table->enum('status', Transaction::STATUSES);
            $table->char('response_code', 2);
            $table->foreignId('payment_method_id');
            $table->string('pan', 19);
            $table->string('receipt', 16);
            $table->string('authorization', 40);
            $table->dateTime('date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
}
