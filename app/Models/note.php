<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class note extends Model
{
    use HasFactory;

    protected $fillable = [
        'classe_id',
        'matiere_id',
        'eleve_id',
        'note'
    ];

    public $timestamps = false;


    public function classe(){
        return $this->belongsTo(classe::class);
    }
    public function matiere(){
        return $this->belongsTo(matiere::class);
    }
    public function eleve(){
        return $this->belongsTo(eleve::class);
    }
}
