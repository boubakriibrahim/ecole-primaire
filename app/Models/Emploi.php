<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo(classe::class);
    }

    public function enseignant(){
        return $this->belongsTo(enseignant::class);
    }
}
