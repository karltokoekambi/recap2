<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Absence;
use App\Models\AccidentTravail;
use App\Models\Discipline;
use App\Models\Employe;
use App\Models\Entretien;
use App\Models\HeuresContrat;
use App\Models\HeuresEffectuees;
use App\Models\JourneeSolidarite;
use App\Models\Mutuelle;
use App\Models\Poste;
use App\Models\PrimeEval;
use App\Models\RegimeMutuelle;
use App\Models\Restaurant;
use App\Models\TravailNuit;
use App\Models\TypeAbsence;
use App\Models\VisiteMedicale;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Restaurant::factory(10)->create();
        Poste::factory(10)->create();
        Employe::factory(10)->create();
        Mutuelle::factory(10)->create();
        RegimeMutuelle::factory(10)->create();
        TypeAbsence::factory(10)->create();
        Absence::factory(10)->create();
        VisiteMedicale::factory(10)->create();
        TravailNuit::factory(10)->create();
        PrimeEval::factory(10)->create();
        AccidentTravail::factory(10)->create();
        Discipline::factory(10)->create();
        Entretien::factory(10)->create();
        HeuresContrat::factory(10)->create();
        HeuresEffectuees::factory(10)->create();
        JourneeSolidarite::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
