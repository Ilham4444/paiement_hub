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
        Schema::create('payment_orders', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('title');
            $table->decimal('montant', 10, 2);
            $table->decimal('montant_restant', 10, 2);
            $table->foreignId('article_id')->constrained()->onDelete('cascade');
            $table->foreignId('platform_id')->constrained()->onDelete('cascade');
            $table->string('external_id');
            $table->morphs('beneficiary');
            $table->enum('status', ['Non_paye', 'Partiellement_paye', 'Paye'])->default('Non_paye');
            $table->json('meta_data')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_orders');
    }
};
