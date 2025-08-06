<?php

namespace Database\Factories;
use Illuminate\Support\Facades\File;
use App\Models\Immobilier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $images = null;

        if (is_null($images)) {
            $path = public_path('admin/media/photos');
            $images = collect(File::files($path))->map(function ($file) {
                return 'admin/media/photos/' . $file->getFilename();
            })->shuffle()->values();
        }

        // On prend une image au hasard (ou en boucle si tu veux)
        $image = $images->count() ? $images->pop() : 'admin/media/photos/bg_minecraft.png';

        return [
            'immobilier_id' => Immobilier::inRandomOrder()->value('id'),
            'chambre_id' => null,
            'url' => $image,
            'principale' => rand(0, 1),
        ];

        // return [
        //     'immobilier_id' => Immobilier::factory(),
        //     'chambre_id' => null, // ou \App\Models\Chambre::factory(),
        //     'url' => $this->faker->imageUrl(640, 480, 'house', true),
        // ];

    }
}
