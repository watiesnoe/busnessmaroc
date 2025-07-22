<?php

namespace Database\Factories;

use App\Models\Favori;
use App\Models\Immobilier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FavoriFactory extends Factory
{
    protected $model = Favori::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'immobilier_id' => Immobilier::inRandomOrder()->first()?->id ?? Immobilier::factory(),
        ];
    }
}
