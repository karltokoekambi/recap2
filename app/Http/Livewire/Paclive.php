<?php

namespace App\Http\Livewire;

use App\Mail\PACmail;
use App\Models\Absence;
use App\Models\Employe;
use App\Models\HeuresContrat;
use App\Models\TypeAbsence;
use Illuminate\Support\Facades\Mail;
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

        $pac = $this->scopping($employees);
        //dd($pac);
        return view('livewire.paclive', [
            'employes' => $employees,
            'absences' => TypeAbsence::all(),
            'contrats' => $pac,
            'yearScope' => $this->yearScope,
            'ttlabs' => $this->yearlyAbsList()
        ]);
    }

    public function scopping($employees){
        $return = [];
        if($this->selection == 0){
            $contratsPerso = [];
            $employes = Employe::addselect(['heuresinit' => HeuresContrat::select('nb_heures_mois')
                ->whereColumn('employe_id', 'employes.id')
                ->orderBy('date_effet', 'asc')
                ->limit(1)
            ])->get();
            $yearlimit = intval(date('Y'));
            foreach($employes as $e){
                $lastValue=null;
                $contratsPerso[$e->id] = HeuresContrat::select('date_effet as date','nb_heures_mois as nb')
                    ->orderBy('date_effet', 'asc')
                    ->where('employe_id', $e->id)
                    ->get();
                if(isset($e['heuresinit'])){
                    $startMonth = intval($e['date_entree']->format('m'));
                    $startYear = intval($e['date_entree']->format('Y'));
                    for($y = $startYear;$y<=$yearlimit; $y++){
                        $cumul = 0;
                        for($m = $startMonth;$m<=12; $m++){

                            if((!isset($e->date_sortie) || $e->date_sortie >= date_create($y.'-'.$m.'-31')) && ($y < $yearlimit || $m <= intval(date('m')))){
                                $flag = false;
                                foreach($contratsPerso[$e->id] as $c){
                                    if($m<10){
                                        $string = $y.'-0'.$m;
                                    }else{
                                        $string = $y.'-'.$m;
                                    }
                                    if(str_contains($c['date'], $string)){
                                        $lastValue = $c['nb'];
                                        $return[$e->id][$y][$m] = $c['nb'];
                                        $flag =true;
                                        break;
                                    }
                                }
                                if(!$flag){
                                    $return[$e->id][$y][$m] = $lastValue;
                                }
                                $cumul += $lastValue;
                            }
                        }
                        if(isset($cumul) && $cumul>0){
                            $return[$e->id][$y]['moyenne'] = sprintf("%0.2f",$cumul/12);
                        }
                        $startMonth = 1;
                    }
                }
            }
        }else{
            foreach($employees as $emp){
                $return[$emp->id] = $this->getAbsences($emp->id, $this->selection);
            }
        }
        $this->yearScope['debut'] = HeuresContrat::min(DB::raw('YEAR(date_effet)'));
        $this->yearScope['fin'] = intval(date('Y'));
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
    public function getAbsencesByYear($empId, $type, $year){
        $return =  Absence::select(DB::raw('SUM(nb_jours_absence) as total'))
            ->where('employe_id', $empId)
            ->where('type_absence_id', $type)
            ->whereyear('date', $year)
            ->get();
        return $return;
    }
    public function yearlyAbsList(){
        $employes = Employe::all();
        $return = [];
        foreach($employes as $emp){
            $return[$emp->id] = $this->getAbsencesByYear($emp->id, $this->selection, $this->year);
        }
        return $return;
    }
}
