<?php

namespace App\Http\Controllers\featuresControllers;

use App\Http\Controllers\Controller;
use App\Models\Employé;
use App\Models\Entretien;

class EntretiensController extends Controller
{
    public function indexEntretiens(){

        $entretiens = Entretien::orderBy('dateEntretien')->get();
        $employes = Employé::addSelect(['prochainedateEntretien' => Entretien::select('dateEntretien')->whereColumn('employé_id', 'employés.id')->where('bilan', '=', 0)->orderBy('dateEntretien', 'desc')->limit(1)])
            ->addSelect(['prochainedateBilan' => Entretien::select('dateEntretien')->whereColumn('employé_id', 'employés.id')->where('bilan', '=', 1)->orderBy('dateEntretien', 'desc')->limit(1)])
            ->get();

        //dd($employes);

        foreach($employes as $employe){
            if(!$employe->prochainedateEntretien){
                $employe->prochainedateEntretien = date('Y-m-d', strtotime($employe->date_entree. ' + 2 year'));
            }else{
                $employe->prochainedateEntretien = date('Y-m-d', strtotime($employe->prochainedateEntretien. ' + 2 year'));
            }
            if(!$employe->prochainedateBilan) {
                $employe->prochainedateBilan = date('Y-m-d', strtotime($employe->date_entree. ' + 6 year'));
            }else{
                $employe->prochainedateBilan = date('Y-m-d', strtotime($employe->prochainedateBilan. ' + 6 year'));
            }

        }

        $countBilan = 0;
        $countEntretien = 0;
        foreach($employes as $employe) {
            $tempcountBilan = 0;
            $tempcountEntretien = 0;
            foreach($entretiens as $entretien){
                if($entretien->employé_id == $employe->id && $entretien->bilan  ) {
                    $tempcountBilan++;
                }
                if($entretien->employé_id == $employe->id && !$entretien->bilan) {
                    $tempcountEntretien++;
                }
            }
            if($tempcountBilan > $countBilan) {
                $countBilan = $tempcountBilan;
            }
            if($tempcountEntretien > $countEntretien) {
                $countEntretien = $tempcountEntretien;
            }

        }

        //dd($employes, $entretiens);

        return view('features.Entretiens.Entretiens',[
            'entretiens' => $entretiens,
            'employes' => $employes,
            'countBilan' => $countBilan,
            'countEntretien' => $countEntretien
        ]);
    }
}
