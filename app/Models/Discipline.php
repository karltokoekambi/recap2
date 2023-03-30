<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_id',
        'remise_convocation',
        'date_convocation',
        'faits_reproches',
        'sanction',
        'date_notification'
    ];

    protected $casts = [
        'date_convocation' => 'date',
        'date_notification' => 'date'
    ];

    public function employe(){
        return $this->BelongsTo(Employe::class);
    }
}
