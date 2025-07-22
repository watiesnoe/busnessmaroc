<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'nom' => $this->faker->randomElement(['Maison', 'Appartement', 'Immeuble', 'Chambre']),
        ];
    }
}
