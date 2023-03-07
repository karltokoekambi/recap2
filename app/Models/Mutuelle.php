<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutuelle extends Model
{
    use HasFactory;

    public function regimeMutuelle(){
        return $this->hasMany(RegimeMutuelle::class);
    }
}
