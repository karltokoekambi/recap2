<?php

namespace App\Http\Controllers\featuresControllers;

use App\Http\Controllers\Controller;
use App\Models\Employé;
use App\Models\TravailNuit;
use Illuminate\Support\Facades\DB;

class TravailNuitController extends Controller
{
    public function index(){
        $listeMois = [
            1 => 'Janvier',
            2 => 'Février',
            3 => 'Mars',
            4 => 'Avril',
            5 => 'Mai',
            6 => 'Juin',
            7 => 'Juillet',
            8 => 'Août',
            9 => 'Septembre',
            10 => 'Octobre',
            11 => 'Novembre',
            12 => 'Décembre'
        ];
        $listeAnnées = TravailNuit::select('annee')->distinct()->orderBy('annee','Asc')->get();

        $ttlheures = TravailNuit::select('annee','employé_id', DB::raw('SUM(nb_heures) as ttlheures'))
            ->groupBy('employé_id','annee')
            ->addSelect('annee','employé_id', DB::raw('SUM(nb_nuits_penibles) as ttlnuits'))
            ->groupBy('employé_id','annee')->get();

        //dd((int)$ttlheures[1]->ttlheures);

        return view('features.TravailNuit.TravailNuit',[
            'travauxNuit' => TravailNuit::all(),
            'employes' => Employé::all(),
            'listeMois' => $listeMois,
            'listeAnnées' => $listeAnnées,
            'ttlheures' => $ttlheures,
            'currentYear' => date('Y')
        ]);
    }
}
