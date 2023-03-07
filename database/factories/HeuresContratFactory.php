<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HeuresContrat>
 */
class HeuresContratFactory extends Factory
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
            'date_reception' => $this->faker->date(),
            'date_effet' => $this->faker->date(),
            'nb_heures_mois' => $this->faker->numberBetween(1,151),
        ];
    }
}
