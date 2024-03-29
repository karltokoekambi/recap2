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

        HeuresContrat::create([
            'employe_id' => Employe::all()->last()->id,
            'date_reception' => $data['indate'],
            'date_effet' => $data['indate'],
            'nb_heures_mois' => $data['contratinit'],
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
        $month = date('m',strtotime($request->input('date')));
        $year = date('Y',strtotime($request->input('date')));
        //dd($month, $year);
        foreach(Employe::all() as $emp){
            $data = $request->validated();
            $condition = $request->input('hours_'.$emp->id);
            //dd(intval($condition));
            if(!empty($condition)){
            $abs = Absence::where('employe_id', $emp->id)
                    ->where('type_absence_id', $request->input('type'))
                    ->whereYear('date',$year)
                    ->whereMonth('date', $month)
                    ->first();
            //dd($abs);
                if(!isset($abs)) {
                    Absence::create([
                        'employe_id' => $emp->id,
                        'type_absence_id' => $request->input('type'),
                        'date' => $request->input('date'),
                        'nb_jours_absence' => intval($condition)
                    ]);
                }else{
                    $abs->update([
                        'employe_id' => $emp->id,
                        'type_absence_id' => $request->input('type'),
                        'date' => $request->input('date'),
                        'nb_jours_absence' => intval($condition)
                    ]);
                }
            }
        }
        return redirect('PAC');
    }

    public function contractcreate(){
        return view('features.PAC.addContract', [
            'employes' => Employe::all()
        ]);
    }

    public function contractsave(StoreContractRequest $request){
        $data = $request->validated();

        $date = date('Y-m',strtotime($data['effect']));

        $user = HeuresContrat::where('employe_id', $data['employee'])
            ->where('date_effet', 'LIKE', $date.'%')
            ->first();

        if(isset($user)){
            $user->update([
                'date_reception' => $data['reception'],
                'nb_heures_mois' => $data['hours'],
            ]);
        }else{
            HeuresContrat::create([
                'employe_id' => $data['employee'],
                'date_reception' => $data['reception'],
                'date_effet' => $data['effect'],
                'nb_heures_mois' => $data['hours'],
            ]);
        }

        return redirect('PAC');
    }
}
