<?php

namespace App\Http\Controllers\featuresControllers;

use App\Http\Requests\StoreDiscRequest;
use App\Models\Discipline;
use App\Models\Employe;
use App\Http\Controllers\Controller;

class DisciplineController extends Controller
{
    public function index(){
        $discipline = Discipline::orderBy('date_convocation', 'desc')
            ->addSelect(['employe_nom' => Employe::select('nom')->whereColumn('id', 'employe_id')])
            ->addSelect(['employe_prenom' => Employe::select('prenom')->whereColumn('id', 'employe_id')])
            ->get();

        return view('features.Discipline.Discipline', [
            'discipline' => $discipline
        ]);
    }

    public function create(){
        return view('features.Discipline.addDisc', [
            'employes' => Employe::all()
        ]);
    }

    public function save(StoreDiscRequest $request){
        $data = $request->validated();

        Discipline::create([
            'employe_id' => $data['employee'],
            'remise_convocation' => $data['convgiven'],
            'date_convocation' => $data['convdate'],
            'faits_reproches' => $data['allegedfacts'],
            'sanction' => $data['sanction'],
            'date_notification' => $data['notifdate']
        ]);

        $discipline = Discipline::orderBy('date_convocation', 'desc')
            ->addSelect(['employe_nom' => Employe::select('nom')->whereColumn('id', 'employe_id')])
            ->addSelect(['employe_prenom' => Employe::select('prenom')->whereColumn('id', 'employe_id')])
            ->get();

        return view('features.Discipline.Discipline', [
            'discipline' => $discipline
        ]);
    }

    public function edit($id){
        $discipline = Discipline::find($id);
        return view('features.Discipline.editDisc', [
            'discipline' => $discipline,
            'employes' => Employe::all()
        ]);
    }
}
