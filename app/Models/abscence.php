<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class abscence extends Model
{
    use HasFactory;
    protected $fillable = [
        'seance_id',
        'eleve_id',
        'date',
        'etat',
    ];
    public function eleve(){
        return $this->belongsTo(eleve::class);
    }
    public $timestamps = false;
}
