<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JourneeSolidarite>
 */
class JourneeSolidariteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employé_id' => $this->faker->numberBetween(1, 10),
            'dateJS' => $this->faker->date(),
            'nb_heures_a_faire' => $this->faker->numberBetween(1, 10),
            'nb_heures_effectuées' => $this->faker->numberBetween(1, 10),
            'emargement' => $this->faker->boolean,
        ];
    }
}
