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
            'employe_id' => $this->faker->numberBetween(1,10),
            'date' => $this->faker->date('d-m-Y', 'now'),
            'note' => 'A',
            'montant_prime' => $this->faker->numberBetween(1,100),
            'date_entretien' => $this->faker->date('d-m-Y'),
        ];
    }
}
