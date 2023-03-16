<?php

namespace App\Http\Controllers\featuresControllers;

use App\Http\Controllers\Controller;
use App\Models\Employé;
use App\Models\VisiteMedicale;

class VMController extends Controller
{
    public function index(){

        $visites = VisiteMedicale::orderBy('date_visite')->get();
        $employes = Employé::all();
        $count = 0;
        foreach($employes as $employe) {
            $tempcount = 0;
            foreach($visites as $visite){
                if($visite->employé_id == $employe->id) {
                    $tempcount++;
                }
            }
            if($tempcount > $count) {
                $count = $tempcount;
            }

        }
        //dd($employes);

        return view('features.VM.VisiteMedic', [
            'visites' => $visites,
            'employes' => $employes,
            'count' => $count
        ]);
    }
}

