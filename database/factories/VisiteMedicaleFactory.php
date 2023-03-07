<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VisiteMedicale>
 */
class VisiteMedicaleFactory extends Factory
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
            'date_visite' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'commentaire' => $this->faker->text(),
        ];
    }
}
