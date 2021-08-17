<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enseignant extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'login',
        'sexe',
    ];

    public $timestamps = false;
}
