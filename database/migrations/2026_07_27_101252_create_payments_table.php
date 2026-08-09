<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->decimal('montant', 10, 2);
            $table->dateTime('date_paiement');
            $table->enum('status', ['Pending', 'paid', 'cancelled'])->default('Pending');
            $table->string('transaction_reference');
            $table->string('transaction_number');
            $table->string('justification');
            $table->foreignId('payment_order_id')->constrained()->onDelete('cascade');
            $table->string('processed_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
