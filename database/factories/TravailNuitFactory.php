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
            'employe_id' => \App\Models\Employe::factory(),
            'date' => $this->faker->date('d-m-Y', 'now'),
            'nb_heures' => $this->faker->numberBetween(0, 100),
            'nb_nuits_penibles' => $this->faker->numberBetween(0, 100),
        ];
    }
}
