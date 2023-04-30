<?php

namespace App\Http\Livewire;

use App\Models\TravailNuit;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TNlive extends Component
{

    public int $year = 0;
    public array $yearScope = [];

    protected $queryString = [
        'year' => ['except' => 0]
    ];
    public function render()
    {
        $this->scopping();
        return view('livewire.t-nlive', [
            'yearScope' => $this->yearScope,
        ]);
    }

    public function scopping(){
        $this->yearScope['debut'] = TravailNuit::min(DB::raw('YEAR(date)'));
        $this->yearScope['fin'] = intval(date('Y'));
    }
}
