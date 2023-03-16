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
            'employe_id' => $this->faker->numberBetween(1, 10),
            'date' => $this->faker->date('d-m-Y', 'now'),
            'date_reception' => $this->faker->date('d-m-Y'),
            'date_effet' => $this->faker->date('d-m-Y'),
            'nb_heures_mois' => $this->faker->numberBetween(1,151),
        ];
    }
}
