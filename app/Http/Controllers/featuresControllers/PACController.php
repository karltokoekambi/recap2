<?php

namespace App\Http\Controllers\featuresControllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employé;
use App\Http\Controllers\Controller;
use App\Models\Poste;
use Illuminate\Http\Request;

class PACController extends Controller
{
    public function index(){
        return view('features.PAC.index', [
            'employes' => Employé::select('nom','prénom','date_entree','date_sortie')
                ->get()
        ]);
    }

    public function create(){
        return view('features.PAC.addEmployee', [
            'postes' => Poste::all()
        ]);
    }

    public function save(StoreEmployeeRequest $request){
        $data = $request->validated();

        Employé::create([
            'nom' => $data['name'],
            'prénom' => $data['firstname'],
            'date_de_naissance' => $data['birthdate'],
            'date_entree' => $data['indate'],
            'poste_id' => $data['poste'],
            'restaurant_id' => 1,
            'date_fin_RQTH' => $data['rqth'],
            'nationalité' => $data['nationality'],
            'debut_validité' => $data['startvisa'],
            'fin_validité' => $data['endvisa'],
            'numSecu_provisoire' => $data['numSec'],
        ]);

        return view('features.PAC.index', [
            'employes' => Employé::select('nom','prénom','date_entree','date_sortie')
                ->get()
        ]);
    }
}
