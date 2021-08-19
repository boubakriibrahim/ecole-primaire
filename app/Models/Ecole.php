<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecole extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nom',
        'genre',
        'ecole_photo_path',
        'adresse',
        'email',
        'phone',
        'description1',
        'description2',
    ];

    public $timestamps = false;
}
