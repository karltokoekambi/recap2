<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccidentTravail extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_id',
        'date_accident',
        'date_declaration',
        'lieu',
        'commentaire',
        'lesions',
        'date_debut_arret',
        'date_fin_arret',
        'prise_en_charge_CPAM'
    ];

    public function employe(){
        return $this->belongsTo(Employe::class);
    }
}
