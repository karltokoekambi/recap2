<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeuresContrat extends Model
{

    protected $table = 'heures_contrats';

    use HasFactory;

    protected $fillable = [
        'employe_id',
        'date_reception',
        'date_effet',
        'nb_heures_mois',
    ];

    public function employe(){
        return $this->belongsTo(Employe::class);
    }
}
