<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImmobilierFactory extends Factory
{
    public function definition(): array
    {
        return [
            'description' => $this->faker->sentence(6),
            'typeimmeuble' => $this->faker->randomElement(['Appartement', 'Villa', 'Maison', 'Studio']),
            'localisation' => $this->faker->city,
            'statut' => $this->faker->randomElement(['available', 'sold', 'reserved']),
        ];
    }
}
