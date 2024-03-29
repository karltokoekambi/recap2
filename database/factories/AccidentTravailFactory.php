<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AccidentTravail>
 */
class AccidentTravailFactory extends Factory
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
            'date_accident' => $this->faker->date('Y-m-d'),
            'date_declaration' => $this->faker->date('Y-m-d'),
            'lieu' => $this->faker->boolean(),
            'commentaire' => $this->faker->sentence(),
            'lesions' => $this->faker->word(),
            'date_debut_arret' => $this->faker->date('Y-m-d'),
            'date_fin_arret' => $this->faker->date('Y-m-d'),
            'prise_en_charge_CPAM' => $this->faker->boolean(),
        ];
    }
}
