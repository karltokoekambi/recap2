<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PrimeEval>
 */
class PrimeEvalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employé_id' => $this->faker->numberBetween(1,10),
            'annee' => $this->faker->year(),
            'mois' => $this->faker->numberBetween(1,12),
            'note' => 'A',
            'montant_prime' => $this->faker->numberBetween(1,100),
            'date_entretien' => $this->faker->date(),
        ];
    }
}
