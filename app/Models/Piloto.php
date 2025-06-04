<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piloto extends Model
{
    /** @use HasFactory<\Database\Factories\PilotoFactory> */
    use HasFactory;

    public function licencia()
    {
        return $this->hasOne(Licencia::class);
    }

    public function asignable()
    {
        return $this->morphTo();
    }

    public function trofeos()
    {
        return $this->belongsToMany(Trofeo::class);
    }
}
