<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Absence>
 */
class AbsenceFactory extends Factory
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
            'type_absence_id' => $this->faker->numberBetween(1, 10),
            'mois' => $this->faker->numberBetween(1, 12),
            'annee' => $this->faker->year,
            'nb_jours_absence' => $this->faker->numberBetween(1, 30),
        ];
    }
}
