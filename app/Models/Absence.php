<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_id',
        'type_absence_id',
        'date',
        'nb_jours_absence'
    ];

    public function typeAbsence(){
        return $this->belongsTo(TypeAbsence::class);
    }

    public function employe(){
        return $this->belongsTo(Employe::class);
    }
}
