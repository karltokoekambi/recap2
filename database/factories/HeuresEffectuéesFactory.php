<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HeuresEffectuées>
 */
class HeuresEffectuéesFactory extends Factory
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
            'année'     => $this->faker->year(),
            'mois'      => $this->faker->numberBetween(1, 12),
            'nb_heures_effectuées' => $this->faker->numberBetween(1,151),
        ];
    }
}
