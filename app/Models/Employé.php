<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employé extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prénom',
        'date_de_naissance',
        'date_entree',
        'date_sortie',
        'poste_id',
        'date_fin_rqth',
        'nationalité',
        'début_validité',
        'fin_validité',
        'numSecu_provisoire',
        'observations',
        'suivi_indiv',
        'saisie_webplace',
        'date_demande',
        'prochaine_VM',
        'visite_médicale_entree',
        'inscription_openclassroom',
        'date_don_carte_commerçant',
        'papier_McBooster_signé',
        'date_don_carte_McBooster',
        'montant_abonnement_mensuel_TAN',
        'fin_abonnement_TAN',
        'debut_abonnement_TAN',
        'abonnement_TAN',
        'restaurant_id',
    ];

    public function poste(){
        return $this->belongsTo(Poste::class);
    }

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }

    public function heuresContrat(){
        return $this->hasMany(HeuresContrat::class);
    }

    public function heuresEfectuées(){
        return $this->hasMany(HeuresEffectuées::class);
    }

    public function regimeMutuelle(){
        return $this->belongsTo(RegimeMutuelle::class);
    }

    public function discipline(){
        return $this->hasMany(Discipline::class);
    }

    public function visiteMedicale(){
        return $this->hasMany(VisiteMedicale::class);
    }

    public function journeeSolidarite(){
        return $this->hasMany(JourneeSolidarite::class);
    }

    public function primeEval(){
        return $this->hasMany(PrimeEval::class);
    }

    public function accidentTravail(){
        return $this->hasMany(AccidentTravail::class);
    }

    public function travailNuit(){
        return $this->hasMany(TravailNuit::class);
    }

    public function absences(){
        return $this->hasMany(Absence::class);
    }

    public function entretiens(){
        return $this->hasMany(Entretien::class);
    }
}
