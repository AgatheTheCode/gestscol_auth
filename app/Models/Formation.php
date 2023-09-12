<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = ['categorie', 'name', 'promotion', 'num_tp', 'num_td', 'option', 'begin', 'end'];

    protected $casts = [ // pour les dates
        'begin' => 'date',
        'end' => 'date',
    ];
}
