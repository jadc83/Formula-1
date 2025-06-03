<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licencia extends Model
{
    /** @use HasFactory<\Database\Factories\LicenciaFactory> */
    use HasFactory;

    public function piloto()
    {
        return $this->belongsTo(Piloto::class);
    }

}
