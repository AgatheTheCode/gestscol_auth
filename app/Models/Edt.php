<?php

namespace App\Models;

use App\Casts\TimeCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edt extends Model
{
    use HasFactory;

    protected $fillable= ['label', 'room', 'teacher', 'date', 'begin', 'end', 'formation_id', 'group_id'];

    protected $casts = [ // pour les dates
        'date' => 'date',
        'begin' => TimeCast::class,
        'end' => TimeCast::class,
    ];

    public function formation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Formation::class);
    }
    public function groups(): \Illuminate\Database\Eloquent\Relations\belongsToMany
    {
        return $this->belongsToMany(Group::class);
    }
    public function students(): \Illuminate\Database\Eloquent\Relations\belongsToMany
    {
        return $this->belongsToMany(Student::class);
    }

}
