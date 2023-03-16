<?php

namespace App\Http\Controllers\featuresControllers;

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
}
