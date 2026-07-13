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
        Schema::table('contrat_locations', function (Blueprint $table) {
            $table->integer('poulet_chair_qty')->default(0)->after('prix_total');
            $table->integer('poulet_cuit_qty')->default(0)->after('poulet_chair_qty');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contrat_locations', function (Blueprint $table) {
            $table->dropColumn(['poulet_chair_qty', 'poulet_cuit_qty']);
        });
    }
};
