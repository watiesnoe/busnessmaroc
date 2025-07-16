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
            $table->foreignId('immobilier_id')->constrained('immobiliers')->onDelete('cascade'); // Foreign key to the immobiliers table
            $table->string('typechambre'); // Type of the room (e.g., single, double)
            $table->decimal('prix_jour', 10, 2); // Price of the room
            $table->decimal('prix_mois', 10, 2); // Price of the room
            $table->decimal('prix_annee', 10, 2); // Price of the room
            $table->integer('capacite'); // Capacity of the room (number of people it can accommodate)
            $table->text('description')->nullable(); // Description of the room
            $table->string('statut')->default('available'); // Status of the room (e.g., available, booked)

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
