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
            'date_naissance' => fake()->date('d-m-Y'),
            'date_entree' => fake()->date('d-m-Y'),
            'date_sortie' => fake()->date('d-m-Y'),
            'abonnement_TAN' => fake()->numberBetween(0,2),
            'debut_abonnement_TAN' => fake()->date('d-m-Y'),
            'fin_abonnement_TAN' => fake()->date('d-m-Y'),
            'montant_abonnement_mensuel_TAN' => fake()->randomFloat(2, 0, 100),
            'date_don_carte_McBooster' => fake()->date('d-m-Y'),
            'papier_McBooster_signe' => fake()->boolean(),
            'date_don_carte_commerçant' => fake()->date('d-m-Y'),
            'inscription_openclassroom' => fake()->boolean(),
            'visite_medicale_entree' => fake()->date('d-m-Y'),
            'poste_id' => fake()->numberBetween(1, 10),
            'restaurant_id' => fake()->numberBetween(1, 10),
            /*'nationalite' => fake()->country(),
            'debut_validite' => fake()->date('d-m-Y'),
            'fin_validite' => fake()->date('d-m-Y'),
            'numSecu_provisoire' => fake()->numberBetween(100000000000000, 999999999999999),
            'date_fin_RQTH' => fake()->date('d-m-Y'),
            */
        ];
    }
}
