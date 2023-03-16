<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegimeMutuelle extends Model
{
    use HasFactory;

    public function mutuelle(){
        return $this->hasOne(Mutuelle::class);
    }

    public function employe(){
        return $this->hasOne(Employe::class);
    }
}
