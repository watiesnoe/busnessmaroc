<?php

namespace Database\Factories;

use App\Models\Immobilier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chambre>
 */
class ChambreFactory extends Factory
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
            'type' => $this->faker->randomElement(['Simple', 'Double', 'Suite']),
            'prix_jour'=>$this->faker->numberBetween(100, 1000),
            'prix_mois'=>$this->faker->numberBetween(100, 1000),
            'prix_annee'=>$this->faker->numberBetween(100, 1000),
            'capacite' => $this->faker->numberBetween(1, 4),
            'statut' => $this->faker->randomElement(['disponible', 'reservee', 'occupee']),
            'description' => $this->faker->sentence,
        ];
    }
}
