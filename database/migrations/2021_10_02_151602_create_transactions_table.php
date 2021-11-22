<?php

use App\Constants\ReasonCodes;
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
            $table->uuid('uuid');
            $table->foreignId('payer_id')->constrained('persons');
            $table->foreignId('session_id');
            $table->enum('status', Transaction::STATUSES)->default(Transaction::STATUS_PENDING);
            $table->char('response_code', 2)->default(ReasonCodes::REQUEST_IN_PROGRESS);
            $table->morphs('instrument');
            $table->string('receipt', 16)->nullable();
            $table->string('authorization', 40)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
}
