<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Immobilier;

class ImageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'immobilier_id' => Immobilier::factory(), // ou passer un ID manuellement dans les seeders
            'typeimage' => $this->faker->imageUrl(640, 480, 'buildings'),
            'dateposte' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'statut' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
