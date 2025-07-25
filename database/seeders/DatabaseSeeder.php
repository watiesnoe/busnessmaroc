<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Chambre;
use App\Models\Contact;
use App\Models\Favori;
use App\Models\Immobilier;
use App\Models\Photo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Vue;
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
            'role' => 'superadmin',
        ]);
        User::factory()->create([
            'name' => 'Bakary SAMAKE',
            'email' => 'samakebakary338@gmail.com',
            'password' => Hash::make('79653526'),
            'role' => 'superadmin',
        ]);
//        Immobilier::factory()
//            ->count(10)
//            ->has(Image::factory()->count(3)) // chaque immobilier aura 3 images
//            ->create();
        $this->call(CategorieSeer::class);

        // Immobilier::factory(20)->create()->each(function ($bien) {
        //     Chambre::factory(rand(1, 3))->create(['immobilier_id' => $bien->id]);
        //     Photo::factory(3)->create(['immobilier_id' => $bien->id]);
        //     Contact::factory(2)->create(['immobilier_id' => $bien->id]);
        //     Vue::factory(rand(2, 6))->create(['immobilier_id' => $bien->id]);
        // });

        // Favori::factory(10)->create();
    }
}
