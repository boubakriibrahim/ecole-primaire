<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classe;
use App\Models\enseignant;

class Emploi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_classe',
        'id_enseignant',
        'anneescolaire',
    ];

    public $timestamps = false;


    public function classe(){
        return $this->belongsTo(Classe::class);
    }

    public function enseignant(){
        return $this->belongsTo(enseignant::class);
    }
}
