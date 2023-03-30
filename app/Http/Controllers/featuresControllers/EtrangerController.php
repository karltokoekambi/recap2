<?php

namespace App\Http\Controllers\featuresControllers;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\HeuresEffectuees;
use Carbon\Carbon;

class EtrangerController extends Controller
{
    public function index(){
        $equipiers = Employe::where('nationalite', '!=', NULL)
            ->orWhere('date_naissance', '>', Carbon::now()->subYears(18))
            ->orWhere('date_fin_rqth', '!=', NULL)
            ->get();
        $heuresEtrangers = HeuresEffectuees::join('employes', 'employes.id', '=', 'heures_effectuees.employe_id')
            ->where('employes.nationalite', '!=', NULL)
            ->get();

        return view('features.Etranger.Etranger', [
            'equipiers' => $equipiers ,
            'heuresEtrangers' => $heuresEtrangers
        ]);
    }
}
