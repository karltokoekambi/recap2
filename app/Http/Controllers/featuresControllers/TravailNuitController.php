<?php

namespace App\Http\Controllers\featuresControllers;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\TravailNuit;
use Illuminate\Support\Facades\DB;

class TravailNuitController extends Controller
{
    public function index(){
        $listeMois = [
            1 => 'Janvier',
            2 => 'Fevrier',
            3 => 'Mars',
            4 => 'Avril',
            5 => 'Mai',
            6 => 'Juin',
            7 => 'Juillet',
            8 => 'Août',
            9 => 'Septembre',
            10 => 'Octobre',
            11 => 'Novembre',
            12 => 'Decembre'
        ];
        $listeAnnees = TravailNuit::select(DB::raw('YEAR(date) as annee'))->distinct()->orderBy('annee','Asc')->get();

        $ttlheures = TravailNuit::select(DB::raw('YEAR(date) as annee'),'employe_id', DB::raw('SUM(nb_heures) as ttlheures'))
            ->addSelect( DB::raw('YEAR(date) as annee'),'employe_id', DB::raw('SUM(nb_nuits_penibles) as ttlnuits'))
            ->groupBy('employe_id', 'annee')->get();

        return view('features.TravailNuit.TravailNuit',[
            'travauxNuit' => TravailNuit::all(),
            'employes' => Employe::all(),
            'listeMois' => $listeMois,
            'listeAnnees' => $listeAnnees,
            'ttlheures' => $ttlheures,
            'currentYear' => date('Y')
        ]);
    }
}
