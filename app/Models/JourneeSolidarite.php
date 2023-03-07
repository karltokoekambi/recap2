<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JourneeSolidarite extends Model
{
    use HasFactory;

    public function employe(){
        return $this->belongsTo(Employé::class);
    }
}
