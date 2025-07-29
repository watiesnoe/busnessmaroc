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
            $table->unsignedBigInteger('contratlocation_id');
            $table->decimal('montant', 10, 2);
            $table->date('date_paiement');
            $table->string('mode_paiement'); // Exemple: 'paypal', 'orange_money', 'carte'
//            $table->string('statut')->default('completé'); // Exemple: 'completé', 'échoué'
            $table->timestamps();
            $table->foreign('contratlocation_id')
                ->references('id')
                ->on('contrat_locations') // bien ce nom là !
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
