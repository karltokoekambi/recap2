<?php

namespace App\Http\Controllers\featuresControllers;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\Entretien;
use DateTime;

class EntretiensController extends Controller
{
    public function index(){

        $entretiens = Entretien::orderBy('dateEntretien')->get();
        $employes = Employe::select('id', 'nom', 'prenom', 'date_entree')
            ->addSelect(['prochainedateEntretien' => Entretien::select('dateEntretien')->whereColumn('employe_id', 'employes.id')->where('bilan', '=', 0)->orderBy('dateEntretien', 'desc')->limit(1)])
            ->addSelect(['prochainedateBilan' => Entretien::select('dateEntretien')->whereColumn('employe_id', 'employes.id')->where('bilan', '=', 1)->orderBy('dateEntretien', 'desc')->limit(1)])
            ->get();

        //dd($employes);

        foreach($employes as $employe){
            if(!$employe->prochainedateEntretien){
                $employe->prochainedateEntretien = date('d-m-Y', strtotime($employe->date_entree. ' + 2 year'));
            }else{
                $employe->prochainedateEntretien = date('d-m-Y', strtotime($employe->prochainedateEntretien. ' + 2 year'));
            }
            if(!$employe->prochainedateBilan) {
                $employe->prochainedateBilan = date('d-m-Y', strtotime($employe->date_entree. ' + 6 year'));
            }else{
                $employe->prochainedateBilan = date('d-m-Y', strtotime($employe->prochainedateBilan. ' + 6 year'));
            }
            $currentDate = DateTime::createFromFormat('d-m-Y',date('d-m-Y'));
            if(DateTime::createFromFormat('d-m-Y',$employe->prochainedateEntretien) > $currentDate){
                $employe->statusEntretien = true;
            }else{
                $employe->statusEntretien = false;
            }
            if(DateTime::createFromFormat('d-m-Y',$employe->prochainedateBilan) > $currentDate){
                $employe->statusBilan = true;
            }else{
                $employe->statusBilan = false;
            }

        }

        $countBilan = 0;
        $countEntretien = 0;
        foreach($employes as $employe) {
            $tempcountBilan = 0;
            $tempcountEntretien = 0;
            foreach($entretiens as $entretien){
                if($entretien->employe_id == $employe->id && $entretien->bilan  ) {
                    $tempcountBilan++;
                }
                if($entretien->employe_id == $employe->id && !$entretien->bilan) {
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

        //dd($employes);

        return view('features.Entretiens.Entretiens',[
            'entretiens' => $entretiens,
            'employes' => $employes,
            'countBilan' => $countBilan,
            'countEntretien' => $countEntretien
        ]);
    }
}
