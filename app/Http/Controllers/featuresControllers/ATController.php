<?php

namespace App\Http\Controllers\featuresControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AccidentTravail;
use App\Models\Employé;

class ATController extends Controller
{
    //
    public function index(){
        $at = AccidentTravail::orderBy('date_accident', 'desc')
            ->addSelect(['employé_nom' => Employé::select('nom')->whereColumn('id', 'employé_id')])
            ->addSelect(['employé_prénom' => Employé::select('prénom')->whereColumn('id', 'employé_id')])
            ->get();
//        dd($at);
        return view('features.AT.AT', [
            'at'    => $at
        ]);
    }
}
