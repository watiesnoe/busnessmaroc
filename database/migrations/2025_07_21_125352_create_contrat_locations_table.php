<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contrat_locations', function (Blueprint $table) {
            $table->id();

            // Clés étrangères
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('immobilier_id')->constrained()->onDelete('cascade');
            $table->foreignId('chambre_id')->nullable()->constrained()->onDelete('cascade');
            // Champs de contrat
            $table->date('date_debut');
            $table->date('date_fin');
            $table->enum('type_contrat', ['jour', 'mois', 'annee']);
            $table->decimal('prix_total', 15, 2);
            $table->string('statut')->default('en attente');
            $table->text('conditions_particulieres')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contrat_locations');
    }
};
