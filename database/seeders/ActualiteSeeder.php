<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActualiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        DB::table('actualites')->insert([
            [
                'titre' => 'Lancement du Festival de Musique',
                'contenu' => 'La nouvelle édition du festival de musique africaine aura lieu au mois prochain...',
                'image' => 'festival-musique.jpg',
                'auteur' => 'Rédaction Mali Events',
                'date_publication' => Carbon::now()->subDays(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre' => 'Ouverture du Salon Tech à Bamako',
                'contenu' => 'Un grand salon dédié aux startups et à l’innovation technologique s’est ouvert ce matin...',
                'image' => 'salon-tech.jpg',
                'auteur' => 'TechNews Mali',
                'date_publication' => Carbon::now()->subDays(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

}
