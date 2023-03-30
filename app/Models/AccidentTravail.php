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

    protected $casts = [
        'date_accident' => 'date',
        'date_declaration' => 'date',
        'date_debut_arret' => 'date',
        'date_fin_arret' => 'date'
    ];

    public function employe(){
        return $this->belongsTo(Employe::class);
    }
}
