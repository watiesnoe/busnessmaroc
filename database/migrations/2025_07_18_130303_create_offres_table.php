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
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->enum('type_offre', ['emploi', 'stage']);
            $table->date('date_publication');
            $table->string('entreprise');
            $table->string('lieu');
            $table->string('secteur');
            $table->string('niveau');
            $table->date('date_limite');
            $table->unsignedBigInteger('salaire')->nullable();
            $table->text('profil_recherche');
            $table->text('description');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
