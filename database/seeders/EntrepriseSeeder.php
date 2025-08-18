<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Entreprise;
use Faker\Factory as Faker;

class EntrepriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $secteurs = ['agriculture', 'banque', 'informatique', 'industrie', 'commerce'];

        // Crée 10 entreprises
        for ($i = 0; $i < 10; $i++) {
            Entreprise::create([
                'nom' => $faker->company,
                'email' => $faker->unique()->companyEmail,
                'telephone' => $faker->phoneNumber,
                'adresse' => $faker->address,
                'site_web' => $faker->optional()->url,
                'description' => $faker->paragraph(2),
                'secteur' => $faker->randomElement($secteurs),
            ]);
        }
    }
}
