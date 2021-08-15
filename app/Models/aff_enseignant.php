<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo(classe::class);
    }
    public function matiere(){
        return $this->belongsTo(matiere::class);
    }
    public function enseignant(){
        return $this->belongsTo(enseignant::class);
    }
}
