<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsistenciaTecnica extends Model
{
    use HasFactory;

    protected $table='asistenciaTecnica';

    public function equipo(){

        return $this->belongsTo(Persona::class,'idPersona');
    }
}
