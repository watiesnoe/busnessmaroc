<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Check and add to 'offres' table
        if (!Schema::hasColumn('offres', 'uuid')) {
            Schema::table('offres', function (Blueprint $table) {
                $table->uuid('uuid')->nullable()->after('id');
            });

            // Populate existing records with UUIDs
            $offres = DB::table('offres')->get();
            foreach ($offres as $offre) {
                DB::table('offres')
                    ->where('id', $offre->id)
                    ->update(['uuid' => (string) Str::uuid()]);
            }

            Schema::table('offres', function (Blueprint $table) {
                $table->uuid('uuid')->nullable(false)->change();
                $table->unique('uuid');
            });
        }

        // 2. Check and add to 'immobiliers' table
        if (!Schema::hasColumn('immobiliers', 'uuid')) {
            Schema::table('immobiliers', function (Blueprint $table) {
                $table->uuid('uuid')->nullable()->after('id');
            });

            // Populate existing records with UUIDs
            $immobiliers = DB::table('immobiliers')->get();
            foreach ($immobiliers as $immobilier) {
                DB::table('immobiliers')
                    ->where('id', $immobilier->id)
                    ->update(['uuid' => (string) Str::uuid()]);
            }

            Schema::table('immobiliers', function (Blueprint $table) {
                $table->uuid('uuid')->nullable(false)->change();
                $table->unique('uuid');
            });
        }

        // 3. Check and add to 'universites' table
        if (!Schema::hasColumn('universites', 'uuid')) {
            Schema::table('universites', function (Blueprint $table) {
                $table->uuid('uuid')->nullable()->after('id');
            });

            // Populate existing records with UUIDs
            $universites = DB::table('universites')->get();
            foreach ($universites as $universite) {
                DB::table('universites')
                    ->where('id', $universite->id)
                    ->update(['uuid' => (string) Str::uuid()]);
            }

            Schema::table('universites', function (Blueprint $table) {
                $table->uuid('uuid')->nullable(false)->change();
                $table->unique('uuid');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('offres', 'uuid')) {
            Schema::table('offres', function (Blueprint $table) {
                $table->dropColumn('uuid');
            });
        }

        if (Schema::hasColumn('immobiliers', 'uuid')) {
            Schema::table('immobiliers', function (Blueprint $table) {
                $table->dropColumn('uuid');
            });
        }

        if (Schema::hasColumn('universites', 'uuid')) {
            Schema::table('universites', function (Blueprint $table) {
                $table->dropColumn('uuid');
            });
        }
    }
};
