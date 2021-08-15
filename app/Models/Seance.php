<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classe;
use App\Models\enseignant;
use App\Models\Matiere;
use App\Models\Salle;

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
        return $this->belongsTo(enseignant::class, 'id_enseignant' , 'id');
    }

    public function classe(){
        return $this->belongsTo(Classe::class, 'id_classe' , 'id');
    }

    public function matiere(){
        return $this->belongsTo(Matiere::class, 'id_matiere' , 'id');
    }

    public function salle(){
        return $this->belongsTo(Salle::class, 'id_salle' , 'id');
    }

}
