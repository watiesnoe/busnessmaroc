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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('immobilier_id')->constrained()->onDelete('cascade'); // Foreign key to the immobiliers table
            $table->string('typeimage'); // URL of the image
            $table->date('dateposte'); // Date when the image was posted
            $table->string('statut')->default('active'); // Status of the image (e.g., active, inactive)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
