<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeuresContrat extends Model
{

    protected $table = 'heures_contrats';

    use HasFactory;

    public function employe(){
        return $this->belongsTo(Employe::class);
    }
}
