<?php

namespace App\Http\Controllers\featuresControllers;

use App\Http\Controllers\Controller;
use App\Models\Employé;
use App\Models\HeuresEffectuées;

class EtrangerController extends Controller
{
    public function indexEtranger(){
        $etrangers = Employé::where('nationalité', '!=', NULL)->get();
        $heuresEtrangers = HeuresEffectuées::join('employés', 'employés.id', '=', 'heures_effectuées.employé_id')
            ->where('employés.nationalité', '!=', NULL)
            ->get();
        $mineurs = Employé::where('date_de_naissance', '>', date('Y-m-d', strtotime('-18 years')))->get();
        $rqths = Employé::where('date_fin_rqth', '!=', NULL)->get();
        //dd($heuresEtrangers);
        return view('features.Etranger.Etranger', [
            'etrangers' => $etrangers ,
            'heuresEtrangers' => $heuresEtrangers,
            'mineurs'   => $mineurs,
            'rqths'     => $rqths
        ]);
    }
}
