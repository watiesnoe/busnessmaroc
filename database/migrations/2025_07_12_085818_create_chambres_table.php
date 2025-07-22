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
       Schema::create('chambres', function (Blueprint $table) {
        $table->id();
        $table->foreignId('immobilier_id')->constrained()->onDelete('cascade');
        $table->string('type');
        $table->float('prix_jour');
        $table->float('prix_mois');
        $table->float('prix_annee');
        $table->integer('capacite');
        $table->enum('statut', ['disponible', 'reservee', 'occupee'])->default('disponible');
        $table->text('description')->nullable();
        $table->string('image')->nullable(); // ✅ Ajout de l'image ici
        $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chambres');
    }
};
