<?php

namespace App\Http\Controllers\featuresControllers;

use App\Http\Requests\StoreATRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AccidentTravail;
use App\Models\Employe;

class ATController extends Controller
{
    //
    public function index(){
        $at = AccidentTravail::orderBy('date_accident', 'desc')
            ->addSelect(['employe_nom' => Employe::select('nom')->whereColumn('id', 'employe_id')])
            ->addSelect(['employe_prenom' => Employe::select('prenom')->whereColumn('id', 'employe_id')])
            ->get();
//        dd($at);
        return view('features.AT.AT', [
            'at'    => $at
        ]);
    }

    public function create(){
        return view('features.AT.addAT',[
            'employes' => Employe::all()
        ]);
    }

    public function save(StoreATRequest $request){
        $data = $request->validated();

        AccidentTravail::create([
            'employe_id' => $data['employee'],
            'date_accident' => $data['accdate'],
            'date_declaration' => $data['decdate'],
            'lieu' => $data['place'],
            'commentaire' => $data['commentary'],
            'lesions' => $data['lesion'],
            'date_debut_arret' => $data['begdate'],
            'date_fin_arret' => $data['enddate'],
            'prise_en_charge_CPAM' => $data['CPAM']
        ]);

        return redirect('AT');
    }
}
