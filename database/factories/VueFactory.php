<?php

namespace Database\Factories;

use App\Models\Immobilier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vue>
 */
class VueFactory extends Factory
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
                'ip_visiteur' => $this->faker->ipv4,
                'user_agent' => $this->faker->userAgent,
        ];
    }
}
