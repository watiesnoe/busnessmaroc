<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EvenementSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('evenements')->insert([
            [
                'titre' => 'Concert Afrobeat Festival',
                'description' => 'Un grand concert de musique Afrobeat avec des artistes internationaux.',
                'lieu' => 'Stade du 26 Mars, Bamako',
                'date_debut' => Carbon::now()->addDays(10),
                'date_fin' => Carbon::now()->addDays(10)->addHours(5),
                'prix_ticket' => 15000.00,
                'image' => 'concert.jpg',
                'statut' => 'à venir',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre' => 'Salon de l’Innovation Technologique',
                'description' => 'Conférence sur les nouvelles technologies et exposition de startups.',
                'lieu' => 'Centre International de Conférence, Bamako',
                'date_debut' => Carbon::now()->addDays(20),
                'date_fin' => Carbon::now()->addDays(22),
                'prix_ticket' => 10000.00,
                'image' => 'salon-tech.jpg',
                'statut' => 'à venir',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre' => 'Festival de Cinéma Africain',
                'description' => 'Projection de films africains avec des réalisateurs invités.',
                'lieu' => 'Institut Français, Bamako',
                'date_debut' => Carbon::now()->addDays(30),
                'date_fin' => Carbon::now()->addDays(35),
                'prix_ticket' => 5000.00,
                'image' => 'festival-cinema.jpg',
                'statut' => 'à venir',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre' => 'Conférence sur l’Entrepreneuriat Jeune',
                'description' => 'Un séminaire interactif pour les jeunes entrepreneurs.',
                'lieu' => 'Université de Bamako',
                'date_debut' => Carbon::now()->subDays(5),
                'date_fin' => Carbon::now()->subDays(5)->addHours(4),
                'prix_ticket' => 2000.00,
                'image' => 'conference-jeune.jpg',
                'statut' => 'terminé',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
