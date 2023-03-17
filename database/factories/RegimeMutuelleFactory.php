<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegimeMutuelle>
 */
class RegimeMutuelleFactory extends Factory
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
            'mutuelle_id' => $this->faker->numberBetween(1, 10),
            'nb_enfants' => $this->faker->numberBetween(0, 10),
            'conjoint' => $this->faker->boolean,
            'date_deb_CMU' => $this->faker->date('Y-m-d'),
            'date_fin_CMU' => $this->faker->date('Y-m-d'),
        ];
    }
}
