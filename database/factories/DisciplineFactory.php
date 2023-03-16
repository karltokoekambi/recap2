<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discipline>
 */
class DisciplineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employe_id' => fake()->numberBetween(1, 10),
            'remise_convocation' => fake()->date('d-m-Y'),
            'date_convocation' => fake()->date('d-m-Y'),
            'faits_reproches' => fake()->text(),
            'sanction' => fake()->word(),
            'date_notification' => fake()->date('d-m-Y'),
        ];
    }
}
