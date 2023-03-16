<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccidentTravail extends Model
{
    use HasFactory;

    public function employe(){
        return $this->belongsTo(Employe::class);
    }
}
