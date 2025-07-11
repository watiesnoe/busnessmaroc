<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Immobilier;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Siaba Noé',
            'email' => 'siabaneotraore@gmail.com',
            'password' => Hash::make('watiesnoe123'),
        ]);
        Immobilier::factory()
            ->count(10)
            ->has(Image::factory()->count(3)) // chaque immobilier aura 3 images
            ->create();
    }
}
