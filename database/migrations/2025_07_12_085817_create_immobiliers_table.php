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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('titre');
            $table->text('description');
            $table->string('ville');
            $table->string('quartier')->nullable();
            $table->float('surface');
            $table->float('prix');
            $table->integer('etage')->nullable();
            $table->enum('statut', ['disponible', 'reserve', 'loue'])->default('disponible');
           $table->boolean('en_vedette')->default(false); // ✅ Champ ajouté ici
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
