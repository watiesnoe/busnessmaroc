<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Immobilier;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition(): array
    {
        return [
            'immobilier_id' => Immobilier::factory(),
            'nom' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'message' => $this->faker->paragraph,
        ];
    }
}
