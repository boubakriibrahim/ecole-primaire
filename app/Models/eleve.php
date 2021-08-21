<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eleve extends Model
{
    use HasFactory;
    protected $fillable=["nom","prenom","date_naissance","num_inscri","sexe"];
    public $timestamps = false;
}
