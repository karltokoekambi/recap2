<?php

namespace App\Http\Controllers\featuresControllers;

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
        //dd($discipline);
        return view('features.Discipline.Discipline', [
            'discipline' => $discipline
        ]);
    }
}
