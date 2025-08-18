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
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
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
        ]);
        $imagesPath = database_path('seeders/images');
         $imageFiles = glob($imagesPath . '/*.{jpg,jpeg,png}', GLOB_BRACE);

        Immobilier::factory(15)->create()->each(function ($bien) use ($imageFiles) {

    // Créer un nombre aléatoire de chambres (1 à 3)
    $chambres = Chambre::factory(rand(1, 3))->create(['immobilier_id' => $bien->id]);

    // Pour chaque chambre, lui associer une image
    foreach ($chambres as $chambre) {
        // Choisir une image aléatoire
        $randomImage = $imageFiles[array_rand($imageFiles)];

        if (!file_exists($randomImage)) {
            throw new \Exception("Fichier image introuvable : $randomImage");
        }

        $extension = pathinfo($randomImage, PATHINFO_EXTENSION);
        $fileName = Str::random(20) . '.' . $extension;
        $storagePath = 'chambres/' . $fileName;

        // Copier l'image dans storage/app/public/chambres
        Storage::disk('public')->put($storagePath, file_get_contents($randomImage));

        // Mettre à jour la chambre avec le chemin de l'image
        $chambre->update([
            'image' => $storagePath,
        ]);
    }

    // Créer contacts
    Contact::factory(2)->create(['immobilier_id' => $bien->id]);

    // Créer vues
    Vue::factory(rand(2, 6))->create(['immobilier_id' => $bien->id]);

    // Créer photos immobiliers (3 par bien)
    for ($i = 0; $i < 3; $i++) {
        $randomImage = $imageFiles[array_rand($imageFiles)];
        if (!file_exists($randomImage)) {
            throw new \Exception("Fichier image introuvable : $randomImage");
        }
        $extension = pathinfo($randomImage, PATHINFO_EXTENSION);
        $fileName = Str::random(20) . '.' . $extension;
        $storagePath = 'photos/' . $fileName;
        Storage::disk('public')->put($storagePath, file_get_contents($randomImage));
        Photo::create([
            'immobilier_id' => $bien->id,
            'url' => $storagePath,
            'principale' => ($i === 0) ? 1 : 0,
        ]);
    }
});




         Favori::factory(10)->create();
    }
}
