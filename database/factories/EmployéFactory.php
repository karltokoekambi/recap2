<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employé>
 */
class EmployéFactory extends Factory
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
            'prénom' => fake()->firstName(),
            'date_de_naissance' => fake()->date(),
            'date_entree' => fake()->date(),
            'date_sortie' => fake()->date(),
            'abonnement_TAN' => fake()->numberBetween(0,2),
            'debut_abonnement_TAN' => fake()->date(),
            'fin_abonnement_TAN' => fake()->date(),
            'montant_abonnement_mensuel_TAN' => fake()->randomFloat(2, 0, 100),
            'date_don_carte_McBooster' => fake()->date(),
            'papier_McBooster_signé' => fake()->boolean(),
            'date_don_carte_commerçant' => fake()->date(),
            'inscription_openclassroom' => fake()->boolean(),
            'visite_médicale_entree' => fake()->date(),
            'poste_id' => fake()->numberBetween(1, 10),
            'restaurant_id' => fake()->numberBetween(1, 10),
            /*'nationalité' => fake()->country(),
            'debut_validité' => fake()->date(),
            'fin_validité' => fake()->date(),
            'numSecu_provisoire' => fake()->numberBetween(100000000000000, 999999999999999),
            'date_fin_RQTH' => fake()->date(),
            */
        ];
    }
}
