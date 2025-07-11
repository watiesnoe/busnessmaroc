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
            $table->string('description'); // Description of the property
            $table->string('typeimmeuble'); // Type of the building (e.g., apartment, house)
            $table->string('localisation'); // Location of the property
            $table->string('statut')->default('available'); // Status of the property (e.g., available, sold)
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
