<?php

namespace App\Http\Livewire;

use App\Models\AccidentTravail;
use App\Models\Employe;
use Livewire\Component;

class ATlive extends Component
{
    public function render()
    {
        $at = AccidentTravail::orderBy('date_accident', 'desc')
            ->addSelect(['employe_nom' => Employe::select('nom')->whereColumn('id', 'employe_id')])
            ->addSelect(['employe_prenom' => Employe::select('prenom')->whereColumn('id', 'employe_id')])
            ->get();

        return view('livewire.a-tlive', [
            'at'    => $at
        ]);
    }
}
