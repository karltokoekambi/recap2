<?php

namespace App\Http\Controllers\featuresControllers;

use App\Http\Controllers\Controller;
use App\Models\Employé;
use App\Models\Mutuelle;
use App\Models\Poste;
use App\Models\RegimeMutuelle;

class MutuelleController extends Controller
{
    public function index(){

        $mutuelles = Employé::addSelect(['cadre' => Poste::select('cadre')->whereColumn('poste_id', 'id')])
            ->get();
        $typesMutuelle = Mutuelle::all();
        $listeRegimes = RegimeMutuelle::all();

        //dd($typesMutuelle, $listeRegimes, $mutuelles);

        return view('features.Mutuelle.Mutuelle', [
            'mutuelles' => $mutuelles,
            'typesMutuelle' => $typesMutuelle,
            'listeRegimes' => $listeRegimes
        ]);
    }
}
