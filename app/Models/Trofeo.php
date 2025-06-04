<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trofeo extends Model
{
    /** @use HasFactory<\Database\Factories\TrofeoFactory> */
    use HasFactory;

    public function pilotos()
    {
        return $this->belongsToMany(Piloto::class);
    }
}
