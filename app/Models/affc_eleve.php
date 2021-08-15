<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class affc_eleve extends Model
{
    use HasFactory;
    protected $fillable = [
        'classe_id',
        'eleve_id'
    ];
    public function classe(){
        return $this->belongsTo(classe::class);
    }
    public function eleve(){
        return $this->belongsTo(eleve::class);
    }
}
