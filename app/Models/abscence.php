<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class abscence extends Model
{
    use HasFactory;
    protected $fillable = [
        'jour',
        'heure_debut',
        'heure_fin',
        'eleve_id',
        'anneescolaire'
    ];
    public function eleve(){
        return $this->belongsTo(eleve::class);
    }
    public $timestamps = false;
}
