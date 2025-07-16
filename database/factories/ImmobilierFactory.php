<?php
namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImmobilierFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'category_id' =>$this->faker->numberBetween(1, 4),
            'titre' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'ville' => $this->faker->city,
            'quartier' => $this->faker->word,
            'surface' => $this->faker->numberBetween(30, 300),
            'prix' => $this->faker->numberBetween(500, 10000),
            'etage' => $this->faker->numberBetween(0, 5),
            'en_vedette' => $this->faker->boolean(20),
            'statut' => $this->faker->randomElement(['disponible', 'reserve', 'loue']),
        ];
    }
}
