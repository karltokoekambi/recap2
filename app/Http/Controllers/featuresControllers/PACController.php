<?php

namespace App\Http\Controllers\featuresControllers;

use App\Http\Requests\StoreAbsRequest;
use App\Http\Requests\StoreContractRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Absence;
use App\Models\Employe;
use App\Http\Controllers\Controller;
use App\Models\HeuresContrat;
use App\Models\Poste;
use App\Models\TypeAbsence;
use Illuminate\Http\Request;

class PACController extends Controller
{
    public function index(){
        return view('features.PAC.index');
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
            'visite_medicale_entree' => $data['vmvisitin'],
            'date_fin_RQTH' => $data['rqth'],
            'nationalite' => $data['nationality'],
            'debut_validite' => $data['startvisa'],
            'fin_validite' => $data['endvisa'],
            'numSecu_provisoire' => $data['numSec'],
        ]);

        return redirect('PAC');
    }

    public function abscreate(){
        return view('features.PAC.addAbs',[
            'typesAbs' => TypeAbsence::all(),
            'employes' => Employe::all()
        ]);
    }

    public function abssave(StoreAbsRequest $request){
        foreach(Employe::all() as $emp){
            $data = $request->validated();
            $condition = $request->input('hours.'.$emp->id);
            if(isset( $condition)){
                echo 'ok';
                Absence::create([
                    'employe_id' => $request->input('employee'),
                    'type_absence_id' => $request->input('type'),
                    'date' => $request->input('date'),
                    'nb_jours_absence' => $request->input('hours.'.$emp->id)
                ]);
            }
        }
        return view('features.PAC.index');
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

        return view('features.PAC.index');
    }
}
