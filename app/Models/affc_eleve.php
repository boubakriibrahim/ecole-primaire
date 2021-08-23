<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classe;
use App\Models\eleve;

class affc_eleve extends Model
{
    use HasFactory;
    protected $fillable = [
        'classe_id',
        'eleve_id'
    ];

    public $timestamps = false;

    public function classe(){
        return $this->belongsTo(Classe::class, 'classe_id', 'id');
    }
    public function eleve(){
        return $this->belongsTo(eleve::class, 'eleve_id', 'id');
    }
}
