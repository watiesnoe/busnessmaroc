<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commandes_poulet', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();

            // Client info (peut être anonyme ou connecté)
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('nom_client');
            $table->string('telephone_client');
            $table->string('email_client')->nullable();
            $table->text('adresse_livraison');
            $table->string('ville_livraison')->default('Casablanca');

            // Produits commandés
            $table->integer('poulet_chair_qty')->default(0)->comment('Poulets de chair vifs');
            $table->integer('poulet_cuit_qty')->default(0)->comment('Viande cuite de poulet de chair');

            // Tarifs appliqués (snapshot)
            $table->decimal('prix_unitaire_chair', 8, 2)->default(3000);
            $table->decimal('prix_unitaire_cuit', 8, 2)->default(4000);
            $table->decimal('montant_total', 10, 2);

            // Date et heure de livraison souhaitée
            $table->date('date_livraison_souhaitee')->nullable();
            $table->string('creneau_livraison')->nullable()->comment('matin, midi, soir');

            $table->text('notes')->nullable();
            $table->enum('statut', ['en_attente', 'confirmee', 'en_preparation', 'livree', 'annulee'])->default('en_attente');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commandes_poulet');
    }
};
