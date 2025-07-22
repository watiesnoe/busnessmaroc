<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Maison', 'Appartement', 'Immeuble', 'Chambre'];

        foreach ($categories as $cat) {
            Category::firstOrCreate(['nom' => $cat]);
        }
    }
}
