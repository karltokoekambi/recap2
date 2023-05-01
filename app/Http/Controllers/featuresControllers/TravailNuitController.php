<?php

namespace App\Http\Controllers\featuresControllers;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\TravailNuit;
use Illuminate\Support\Facades\DB;

class TravailNuitController extends Controller
{
    public function index(){
        return view('features.TravailNuit.TravailNuit');
    }
}
