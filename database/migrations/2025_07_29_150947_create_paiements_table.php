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
            $table->uuid('uuid')->unique();

            // Clé étrangère correcte vers contrat_locations
            $table->unsignedBigInteger('contratlocation_id');
            $table->decimal('montant', 10, 2);
            $table->date('date_paiement');
            $table->string('mode_paiement');
            $table->string('statut')->default('en_attente');

            $table->timestamps();

            // Correction ici :
            $table->foreign('contratlocation_id')
                ->references('id')
                ->on('contrat_locations') // ✅ bon nom de table
                ->onDelete('cascade');
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
