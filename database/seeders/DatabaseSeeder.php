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
        User::factory()->create([
            'name' => 'Aminata DIALLO',
            'email' => 'amitacompt90@gmail.com',
            'password' => Hash::make('111111'),
            'role' => 'superadmin',
        ]);
        User::factory()->create([
            'name' => 'Keka baya',
            'email' => 'kekabaya97@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 'client',
        ]);
         User::factory()->create([
            'name' => 'Oumar Ouologuem',
            'email' => 'ouologuem.digitafrika@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 'superadmin',
        ]);
//        Immobilier::factory()
//            ->count(10)
//            ->has(Image::factory()->count(3)) // chaque immobilier aura 3 images
//            ->create();
        $this->call([
            EntrepriseSeeder::class,
        ]);
        $this->call([
            CategorieSeer::class,
            OffreSeeder::class,
            SiteDataSeeder::class,
        ]);
        $imagesPath = public_path('image');
        $imageFiles = glob($imagesPath . '/*.{jpg,jpeg,png,JPG,JPEG,PNG}', GLOB_BRACE);

        // Construire la liste des chemins relatifs (ex: "image/IMG-20260811-WA0047.jpg")
        $imagePaths = array_map(fn($f) => 'image/' . basename($f), $imageFiles);

        Immobilier::factory(15)->create()->each(function ($bien) use ($imagePaths) {

    // Créer un nombre aléatoire de chambres (1 à 3)
    $chambres = Chambre::factory(rand(1, 3))->create(['immobilier_id' => $bien->id]);

    // Pour chaque chambre, lui associer une image directement depuis public/image/
    foreach ($chambres as $chambre) {
        $chambre->update([
            'image' => $imagePaths[array_rand($imagePaths)],
        ]);
    }

    // Créer contacts
    Contact::factory(2)->create(['immobilier_id' => $bien->id]);

    // Créer vues
    Vue::factory(rand(2, 6))->create(['immobilier_id' => $bien->id]);

    // Créer photos immobiliers (3 par bien) — depuis public/image/ directement
    $shuffled = $imagePaths;
    shuffle($shuffled);
    $selectedPhotos = array_slice($shuffled, 0, 3);

    foreach ($selectedPhotos as $idx => $photoPath) {
        Photo::create([
            'immobilier_id' => $bien->id,
            'url'           => $photoPath,
            'principale'    => ($idx === 0) ? 1 : 0,
        ]);
    }
});




         Favori::factory(10)->create();
    }
}
