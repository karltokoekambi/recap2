<?php

namespace App\Http\Controllers\featuresControllers;

use App\Http\Controllers\Controller;
use App\Models\Employe;

class TANController extends Controller
{
    //
    public function index(){

        $datas = Employe::all();
        return view('features.TAN.TAN', [
            'datas' => $datas
        ]);
    }
}
