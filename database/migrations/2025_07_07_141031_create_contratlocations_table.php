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
        Schema::create('contratlocations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('immobilier_id')->constrained('immobiliers')->onDelete('cascade'); // Foreign key to the immobiliers table
            $table->foreignId('chambre_id')->constrained('chambres')->onDelete('cascade'); // Foreign key to the chambres table
            $table->date('date_debut'); // Start date of the contract
            $table->date('date_fin'); // End date of the contract
            $table->decimal('montant', 10, 2); // Amount for the contract
            $table->string('statut')->default('active'); // Status of the contract (active, expired, etc.)
            $table->text('dure')->nullable(); // Additional conditions or terms of the contract
            $table->text('periode')->nullable(); // Additional notes related to the contract
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratlocations');
    }
};
