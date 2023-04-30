<?php

namespace App\Http\Livewire;

use App\Mail\PACmail;
use App\Models\Absence;
use App\Models\Employe;
use App\Models\HeuresContrat;
use App\Models\TypeAbsence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

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

        $pac = $this->scopping(false,$employees);
        //dd($pac);
        return view('livewire.paclive', [
            'employes' => $employees,
            'absences' => TypeAbsence::all(),
            'contrats' => $pac,
            'yearScope' => $this->yearScope,
            'ttlabs' => $this->yearlyAbsList()
        ]);
    }

    public function scopping($primList, $employees){
        $return = [];
        if($this->selection == 0 || $primList){
            $contratsPerso = [];
            if($primList){
                $employes = Employe::where(function(Builder $query) {
                        $query->whereYear('date_entree', '<', $this->year)
                            ->whereYear('date_sortie', '>', $this->year);
                    })
                    ->orWhere(function(Builder $query) {
                        $query->whereYear('date_entree', '<', $this->year)
                            ->where('date_sortie', null);
                    })
                    ->addselect(['heuresinit' => HeuresContrat::select('nb_heures_mois')
                        ->whereColumn('employe_id', 'employes.id')
                        ->orderBy('date_effet', 'asc')
                        ->limit(1)
                    ])->get();
            }else{
                $employes = Employe::addselect(['heuresinit' => HeuresContrat::select('nb_heures_mois')
                    ->whereColumn('employe_id', 'employes.id')
                    ->orderBy('date_effet', 'asc')
                    ->limit(1)
                ])->get();
            }
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
        //dd($return);
        return $return;
    }

    public function getAbsences($empId, $type){
        //if($this->year == 0){
        //    $return = Absence::select('date','nb_jours_absence as nb')
        //        ->orderBy('date', 'asc')
        //        ->where('employe_id', $empId)
        //        ->where('type_absence_id', $type)
        //        ->whereyear('date', date('Y'))
        //        ->get();
        //}else{
            $return =  Absence::select('date','nb_jours_absence as nb')
                ->orderBy('date', 'asc')
                ->where('employe_id', $empId)
                ->where('type_absence_id', $type)
                ->whereyear('date', $this->year)
                ->get();
        //}
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

    public function primeGen(){
        $primes = [];
        $datas = $this->scopping(true, false);
        foreach($datas as $d => $data){
            $dataEmploye = Employe::select('date_entree', 'nom', 'prenom')->where('id', $d)->get();
            $primes[] = [
                'name' => $dataEmploye[0]['nom'].' '.$dataEmploye[0]['prenom'],
                'date' => $dataEmploye[0]['date_entree']->format('d-m-Y'),
                'prime' => $this->primeCalc($dataEmploye[0]['date_entree'], $data[$this->year]['moyenne'], $d)
            ];
        }
        //dd($primes);
        Mail::to(auth()->user()->email)->send(new PACmail($primes, $this->year));
    }

    //1an <= durée < 3ans
    public float $lowerPrime = 178.5;
    //3an <= durée < 5ans
    public float $mediumLowPrime = 242;
    //5an <= durée < 10ans
    public float $mediumHighPrime = 326.7;
    //10an <= durée
    public float $upperPrime = 447.7;

    public function primeCalc($dateDeb,$moyenne, $id){
        $abscpanu = Absence::selectRaw('SUM(nb_jours_absence) as jourscp')
            ->where('employe_id', $id)
            ->where('type_absence_id', 4)
            ->whereYear('date', $this->year)
            ->get();
        $absenceType = TypeAbsence::select('id')->get();
        $absAnu = 0;
        foreach($absenceType as $t => $type){
            if($t != 4){
                $data = Absence::selectRaw('SUM(nb_jours_absence) as jours')
                    ->where('employe_id', $id)
                    ->where('type_absence_id', $t)
                    ->whereYear('date', $this->year)
                    ->get();
                if(!empty($data[0]['jours']) && $data[0]['jours'] > 10){
                    $absAnu += $data[0]['jours'] - 10;
                }
            }
        }
        $ajd = new \DateTime('now');
        $diff = intval(date_diff($dateDeb, $ajd)->format('%y'));
        if($diff<3){
            $MBP = $this->lowerPrime;
        }
        if(3<=$diff && $diff<5){
            $MBP = $this->mediumLowPrime;
        }
        if(5<=$diff && $diff<10){
            $MBP = $this->mediumHighPrime;
        }
        if(10<=$diff ){
            $MBP = $this->upperPrime;
        }
        $vreturn = round($MBP*($moyenne/151.67)*((365-($absAnu+$abscpanu[0]['jourscp']))/365),2);
        return $vreturn;
    }
}
