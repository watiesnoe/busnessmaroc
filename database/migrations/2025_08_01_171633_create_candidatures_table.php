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
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('offre_id')->constrained()->onDelete('cascade');

            $table->string('cv');
            $table->string('lettre_motivation')->nullable();
            $table->text('message')->nullable();

            // ✅ Nouvelles colonnes pour l’évaluation
            $table->boolean('est_approuve')->default(false);
            $table->unsignedTinyInteger('note')->nullable(); // note de 0 à 255 (généralement sur 5 ou 10)

            $table->timestamps();

            // ✅ Contrainte d'unicité composite : user_id + offre_id
            $table->unique(['user_id', 'offre_id'], 'unique_candidature_user_offre');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatures');
    }
};
