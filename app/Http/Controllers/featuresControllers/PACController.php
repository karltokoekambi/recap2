<?php

namespace App\Http\Controllers\featuresControllers;

use App\Http\Requests\StoreContractRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employe;
use App\Http\Controllers\Controller;
use App\Models\HeuresContrat;
use App\Models\Poste;
use App\Models\TypeAbsence;
use Illuminate\Http\Request;

class PACController extends Controller
{
    public function index(){
        return view('features.PAC.index', [
            'employes' => Employe::select('nom','prenom','date_entree','date_sortie')
                ->get(),
            'absences' => TypeAbsence::all()
        ]);
    }

    public function create(){
        return view('features.PAC.addEmployee', [
            'postes' => Poste::all()
        ]);
    }

    public function save(StoreEmployeeRequest $request){
        $data = $request->validated();

        Employe::create([
            'nom' => $data['name'],
            'prenom' => $data['firstname'],
            'date_naissance' => $data['birthdate'],
            'date_entree' => $data['indate'],
            'poste_id' => $data['poste'],
            'restaurant_id' => 1,
            'date_fin_RQTH' => $data['rqth'],
            'nationalite' => $data['nationality'],
            'debut_validite' => $data['startvisa'],
            'fin_validite' => $data['endvisa'],
            'numSecu_provisoire' => $data['numSec'],
        ]);

        return view('features.PAC.index', [
            'employes' => Employe::select('nom','prenom','date_entree','date_sortie')
                ->get(),
            'absences' => TypeAbsence::all()
        ]);
    }

    public function abscreate(){
        return view('features.PAC.addAbs');
    }

    public function contractcreate(){
        return view('features.PAC.addContract', [
            'employes' => Employe::all()
        ]);
    }

    public function contractsave(StoreContractRequest $request){
        $data = $request->validated();

        HeuresContrat::create([
            'employe_id' => $data['employee'],
            'date_reception' => $data['reception'],
            'date_effet' => $data['effect'],
            'nb_heures_mois' => $data['hours'],
        ]);

        return view('features.PAC.index', [
            'employes' => Employe::select('nom','prenom','date_entree','date_sortie')
                ->get(),
            'absences' => TypeAbsence::all()
        ]);
    }
}
