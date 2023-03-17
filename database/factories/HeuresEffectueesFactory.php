<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HeuresEffectuees>
 */
class HeuresEffectueesFactory extends Factory
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
            'date' => $this->faker->date('Y-m-d', 'now'),
            'nb_heures_effectuees' => $this->faker->numberBetween(1,151),
        ];
    }
}
