<?php

namespace App\Http\Controllers\featuresControllers;

use App\Models\Discipline;
use App\Models\Employé;
use App\Http\Controllers\Controller;

class DisciplineController extends Controller
{
    public function index(){
        $discipline = Discipline::orderBy('date_convocation', 'desc')
            ->addSelect(['employé_nom' => Employé::select('nom')->whereColumn('id', 'employé_id')])
            ->addSelect(['employé_prénom' => Employé::select('prénom')->whereColumn('id', 'employé_id')])
            ->get();
        //dd($discipline);
        return view('features.Discipline.Discipline', [
            'discipline' => $discipline
        ]);
    }
}
