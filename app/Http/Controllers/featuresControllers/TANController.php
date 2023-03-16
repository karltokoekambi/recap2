<?php

namespace App\Http\Controllers\featuresControllers;

use App\Http\Controllers\Controller;
use App\Models\Employé;

class TANController extends Controller
{
    //
    public function index(){

        $datas = Employé::all();
        return view('features.TAN.TAN', [
            'datas' => $datas
        ]);
    }
}
