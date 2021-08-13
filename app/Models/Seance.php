<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;

    protected $fillable = [
        'jour',
        'heure_debut',
        'heure_fin',
        'id_enseignant',
        'id_classe',
        'id_matiere',
        'id_salle',
        'anneescolaire',
    ];

    public $timestamps = false;



    public function enseignant(){
        return $this->belongsTo(enseignant::class);
    }

    public function classe(){
        return $this->belongsTo(Classe::class);
    }

    public function matiere(){
        return $this->belongsTo(Matiere::class);
    }

    public function salle(){
        return $this->belongsTo(Salle::class);
    }

}
