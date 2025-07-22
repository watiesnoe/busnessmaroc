<?php

namespace Database\Factories;

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
        return [
            'immobilier_id' => Immobilier::factory(),
            'chambre_id' => null, // ou \App\Models\Chambre::factory(),
            'url' => $this->faker->imageUrl(640, 480, 'house', true),
        ];

    }
}
