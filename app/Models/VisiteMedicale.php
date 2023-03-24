<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiteMedicale extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_id',
        'date_visite',
        'commentaire'
    ];

    protected $casts = [
        'date_visite' => 'date'
    ];

    public function employe(){
        return $this->belongsTo(Employe::class);
    }
}
