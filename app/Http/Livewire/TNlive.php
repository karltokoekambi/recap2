<?php

namespace App\Http\Livewire;

use App\Models\Employe;
use App\Models\TravailNuit;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TNlive extends Component
{

    public int $year = 0;
    public array $yearScope = [];
    public array $listeMois =[
        1 => 'Janvier',
        2 => 'Fevrier',
        3 => 'Mars',
        4 => 'Avril',
        5 => 'Mai',
        6 => 'Juin',
        7 => 'Juillet',
        8 => 'Août',
        9 => 'Septembre',
        10 => 'Octobre',
        11 => 'Novembre',
        12 => 'Decembre'
    ];

    protected $queryString = [
        'year' => ['except' => 0]
    ];
    public function render()
    {
        if($this->year == 0){
            $this->year = date('Y');
        }

        $this->scopping();

        $employees = Employe::select('id', 'nom', 'prenom', 'date_entree', 'date_sortie')
            ->whereYear('date_entree', '<=', $this->year)
            ->where(function(Builder $query) {
                $query->whereYear('date_sortie', '>=', $this->year)
                      ->orWhere('date_sortie', null);
            })
            ->get();

        $TNData = [];
        foreach($employees as $emp){
            if(!empty($emp['date_sortie'])){
                $sortie = $emp['date_sortie']->format('d-m-Y');
            } else {
                $sortie = null;
            }

            //création de l'array répertoriant les heures et jours de TN
            $heuresJours = [];
            foreach($this->listeMois as $m => $mois) {
                if($m <10){
                    $datas = TravailNuit::select('employe_id', 'nb_heures', 'nb_nuits_penibles')
                        ->where('employe_id', $emp['id'])
                        ->whereYear('date', $this->year)
                        ->whereMonth('date', '0'.$m)
                        ->get();
                } else {
                    $datas = TravailNuit::select('employe_id', 'nb_heures', 'nb_nuits_penibles')
                        ->where('employe_id', $emp['id'])
                        ->whereYear('date', $this->year)
                        ->whereMonth('date', $m)
                        ->get();
                }

                if(isset($datas[0])){
                    $heuresJours[$m] = [
                        'hrs' => $datas[0]['nb_heures'],
                        'nts' => $datas[0]['nb_nuits_penibles']
                    ];
                }

            }

            //Ajout des totaux
            $ttlHeures = TravailNuit::select('employe_id', DB::raw('SUM(nb_heures) as ttlheures'))
                ->whereYear('date',$this->year)
                ->where('employe_id',$emp['id'])
                ->groupBy('employe_id')
                ->get();
            if(isset($ttlHeures[0]) && isset($ttlHeures[0]['ttlheures'])){
                $tH = $ttlHeures[0]['ttlheures'];
            } else {
                $tH = null;
            }
            $ttlNuits= TravailNuit::select('employe_id', DB::raw('SUM(nb_nuits_penibles) as ttlnuits'))
                ->whereYear('date',$this->year)
                ->where('employe_id',$emp['id'])
                ->groupBy('employe_id')
                ->get();;
            if(isset($ttlNuits[0]) && isset($ttlNuits[0]['ttlnuits'])){
                $tN = $ttlNuits[0]['ttlnuits'];
            } else {
                $tN = null;
            }

            //passage des données cibles au blade
            $TNData[]=[
                'nom' => $emp['nom'],
                'prenom' => $emp['prenom'],
                'date_entree' => $emp['date_entree']->format('d-m-Y'),
                'date_sortie' => $sortie,
                'heures' => $heuresJours,
                'ttlHrs' => $tH,
                'ttlNts' => $tN,

            ];
        }

        return view('livewire.t-nlive', [
            'yearScope' => $this->yearScope,
            'listeMois' => $this->listeMois,
            'datas' => $TNData
        ]);
    }

    public function scopping(){
        $this->yearScope['debut'] = TravailNuit::min(DB::raw('YEAR(date)'));
        $this->yearScope['fin'] = intval(date('Y'));
    }
}
