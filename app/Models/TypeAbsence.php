<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAbsence extends Model
{
    use HasFactory;

    public function absence(){
        return $this->hasMany(Absence::class);
    }
}
