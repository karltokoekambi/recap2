<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TravailNuit>
 */
class TravailNuitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employé_id' => \App\Models\Employé::factory(),
            'annee' => 2021,
            'mois' => $this->faker->numberBetween(1, 12),
            'nb_heures' => $this->faker->numberBetween(0, 100),
            'nb_nuits_penibles' => $this->faker->numberBetween(0, 100),
        ];
    }
}
