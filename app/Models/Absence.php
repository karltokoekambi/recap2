<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    public function typeAbsence(){
        return $this->belongsTo(TypeAbsence::class);
    }

    public function employe(){
        return $this->belongsTo(Employé::class);
    }
}
