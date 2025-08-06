<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OffreSeeder extends Seeder
{
    public function run(): void
    {
        $types = ['emploi', 'stage'];
        $secteurs = ['Banque', 'Informatique', 'Éducation', 'Santé'];
        $lieux = ['Bamako', 'Sikasso', 'Kayes', 'Mopti'];
        $niveaux = ['Bac', 'Licence', 'Master', 'Doctorat'];

        // Changement ici : modes = interne ou externe
        $modes = ['interne', 'externe'];

        // Les liens peuvent être adaptés ou simplifiés selon mode
        $liens = [
            'https://recrutement.example.com',
            'recrutement@example.com',
            'Déposer au siège de l\'entreprise',
            ''
        ];

        for ($i = 0; $i < 20; $i++) {
            DB::table('offres')->insert([
                'titre' => 'Offre ' . Str::random(5),
                'type_offre' => $types[array_rand($types)],
                'date_publication' => Carbon::now()->subDays(rand(1, 30)),
                'entreprise' => 'Entreprise ' . Str::random(3),
                'lieu' => $lieux[array_rand($lieux)],
                'secteur' => $secteurs[array_rand($secteurs)],
                'niveau' => $niveaux[array_rand($niveaux)],
                'date_limite' => Carbon::now()->addDays(rand(5, 30)),
                'salaire' => rand(200000, 1500000),
                'profil_recherche' => 'Profil recherché pour ce poste : ' . Str::random(20),
                'description' => 'Description de l\'offre : ' . Str::random(50),
                'mode_candidature' => $modes[array_rand($modes)], // interne ou externe
                'lien_candidature' => $liens[array_rand($liens)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}
