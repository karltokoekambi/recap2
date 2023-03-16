<?php

namespace App\Http\Controllers\featuresControllers;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\HeuresEffectuees;

class EtrangerController extends Controller
{
    public function index(){
        $etrangers = Employe::where('nationalite', '!=', NULL)->get();
        $heuresEtrangers = HeuresEffectuees::join('employes', 'employes.id', '=', 'heures_effectuees.employe_id')
            ->where('employes.nationalite', '!=', NULL)
            ->get();
        $mineurs = Employe::where('date_naissance', '>', date('d-m-Y', strtotime('-18 years')))->get();
        $rqths = Employe::where('date_fin_rqth', '!=', NULL)->get();
        //dd($heuresEtrangers);
        return view('features.Etranger.Etranger', [
            'etrangers' => $etrangers ,
            'heuresEtrangers' => $heuresEtrangers,
            'mineurs'   => $mineurs,
            'rqths'     => $rqths
        ]);
    }
}
