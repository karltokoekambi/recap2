<?php

namespace App\Http\Controllers\featuresControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVMRequest;
use App\Models\Employe;
use App\Models\VisiteMedicale;

class VMController extends Controller
{
    public function index(){

        $visites = VisiteMedicale::select('employe_id', 'date_visite', 'commentaire')->orderBy('date_visite')->get();
        $employes = Employe::all();
        $count = 0;
        foreach($employes as $employe) {
            $tempcount = 0;
            foreach($visites as $visite){
                if($visite->employe_id == $employe->id) {
                    $tempcount++;
                }
            }
            if($tempcount > $count) {
                $count = $tempcount;
            }

        }

        return view('features.VM.VisiteMedic', [
            'visites' => $visites,
            'employes' => $employes,
            'count' => $count
        ]);
    }

    public function create(){
        return view('features.VM.addVM',[
            'employes' => Employe::all()
        ]);
    }

    public function save(StoreVMRequest $request){
        $data = $request->validated();

        VisiteMedicale::create([
            'employe_id' => $data['employee'],
            'date_visite' => $data['datevm'],
            'commentaire' => $data['commentary']
        ]);

        return redirect('vm');
    }
}

