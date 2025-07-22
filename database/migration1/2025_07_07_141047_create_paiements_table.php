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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contratlocation_id')->constrained('contratlocations')->onDelete('cascade'); // Foreign key to the contratlocations table
            $table->decimal('montant', 10, 2); // Amount of the payment
            $table->date('date_paiement'); // Date of the payment
            $table->string('mode_paiement'); // Mode of payment (cash, card, etc.)
            $table->string('statut')->default('completed'); // Status of the payment (completed, pending, etc.)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
