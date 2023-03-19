<?php

namespace App\Http\Livewire;

use App\Models\Absence;
use App\Models\Employe;
use App\Models\HeuresContrat;
use App\Models\TypeAbsence;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Paclive extends Component
{
    public int $year = 0;
    public int $selection = 0;
    public array $yearScope = [];

    protected $queryString = [
        'year' => ['except' => 0],
        'selection' => ['except' => 0]
];

    public function render(){

        if($this->year == 0){
            $this->year = date('Y');
        }

        $employees = Employe::select('id','nom','prenom','date_entree','date_sortie')
            ->get();
        $pac = [];

        if($this->selection == 0){
            foreach($employees as $emp){
                $pac[$emp->id] = $this->getContracts($emp->id);
            }

            $this->yearScope['debut'] = HeuresContrat::min(DB::raw('YEAR(date_effet)'));
            $this->yearScope['fin'] = intval(date('Y'));
        }else{
            foreach($employees as $emp){
                $pac[$emp->id] = $this->getAbsences($emp->id, $this->selection);
            }

            $this->yearScope['debut'] = HeuresContrat::min(DB::raw('YEAR(date_effet)'));
            $this->yearScope['fin'] = intval(date('Y'));
        }

        return view('livewire.paclive', [
            'employes' => $employees,
            'absences' => TypeAbsence::all(),
            'contrats' => $pac,
            'yearScope' => $this->yearScope
        ]);
    }

    public function getContracts($id){
        if($this->year == 0){
            $return = HeuresContrat::select('date_effet as date','nb_heures_mois as nb')
                ->orderBy('date_effet', 'asc')
                ->where('employe_id', $id)
                ->whereyear('date_effet', date('Y'))
                ->get();
        }else{
           $return =  HeuresContrat::select('date_effet as date','nb_heures_mois as nb')
                ->orderBy('date_effet', 'asc')
                ->where('employe_id', $id)
                ->whereyear('date_effet', $this->year)
                ->get();
        }

        return $return;
    }
    public function getAbsences($empId, $type){
        if($this->year == 0){
            $return = Absence::select('date','nb_jours_absence as nb')
                ->orderBy('date', 'asc')
                ->where('employe_id', $empId)
                ->where('type_absence_id', $type)
                ->whereyear('date', date('Y'))
                ->get();
        }else{
            $return =  Absence::select('date','nb_jours_absence as nb')
                ->orderBy('date', 'asc')
                ->where('employe_id', $empId)
                ->where('type_absence_id', $type)
                ->whereyear('date', $this->year)
                ->get();
        }

        return $return;
    }
}
