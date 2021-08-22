<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classe;
use App\Models\Matiere;
use App\Models\enseignant;

class aff_enseignant extends Model
{
    use HasFactory;
    protected $fillable = [
        'classe_id',
        'matiere_id',
        'enseignant_id'
    ];

    public $timestamps = false;


    public function classe(){
        return $this->belongsTo(Classe::class, 'classe_id', 'id');
    }
    public function matiere(){
        return $this->belongsTo(Matiere::class, 'matiere_id', 'id');
    }
    public function enseignant(){
        return $this->belongsTo(enseignant::class, 'enseignant_id', 'id');
    }
}
