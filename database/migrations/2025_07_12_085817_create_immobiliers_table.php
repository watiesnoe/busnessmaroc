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
        Schema::create('immobiliers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            // Relation avec une entreprise (optionnelle)
            $table->foreignId('entreprise_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete(); // équivalent à onDelete('set null')

            // Relation avec utilisateur (obligatoire)
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // Relation avec catégorie (obligatoire)
            $table->foreignId('category_id')
                ->constrained()
                ->cascadeOnDelete();

            // Informations du bien
            $table->string('titre');
            $table->text('description');
            $table->string('ville');
            $table->string('quartier')->nullable();
            $table->unsignedInteger('surface')->nullable();
            $table->decimal('prix', 12, 2)->nullable();
            $table->unsignedInteger('etage')->nullable();

            // Options
            $table->boolean('en_vedette')->default(false);
            $table->enum('statut', ['disponible', 'occupe', 'en_attente','loue','reserve'])
                ->default('disponible');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('immobiliers');
    }
};
