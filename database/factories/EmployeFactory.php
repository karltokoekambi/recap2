<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employe>
 */
class EmployeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => fake()->lastName(),
            'prenom' => fake()->firstName(),
            'date_naissance' => fake()->date('Y-m-d'),
            'date_entree' => fake()->date('Y-m-d'),
            'date_sortie' => fake()->date('Y-m-d'),
            'abonnement_TAN' => fake()->numberBetween(0,2),
            'debut_abonnement_TAN' => fake()->date('Y-m-d'),
            'fin_abonnement_TAN' => fake()->date('Y-m-d'),
            'montant_abonnement_mensuel_TAN' => fake()->randomFloat(2, 0, 100),
            'date_don_carte_McBooster' => fake()->date('Y-m-d'),
            'papier_McBooster_signe' => fake()->boolean(),
            'date_don_carte_commerçant' => fake()->date('Y-m-d'),
            'inscription_openclassroom' => fake()->boolean(),
            'visite_medicale_entree' => fake()->date('Y-m-d'),
            'poste_id' => 1,
            'restaurant_id' => 1,
            /*'nationalite' => fake()->country(),
            'debut_validite' => fake()->date('Y-m-d'),
            'fin_validite' => fake()->date('Y-m-d'),
            'numSecu_provisoire' => fake()->numberBetween(100000000000000, 999999999999999),
            'date_fin_RQTH' => fake()->date('Y-m-d'),
            */
        ];
    }
}
