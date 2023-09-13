<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = ['categorie', 'name', 'promotion', 'option', 'begin', 'end'];

    protected $casts = [ // pour les dates
        'begin' => 'date',
        'end' => 'date',
    ];

    public function students(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Student::class);
    }
    public function edt(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Edt::class);
    }
}
