<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsistenciaTecnica extends Model
{
    use HasFactory;

    protected $table='asistenciaTecnica';

    public function persona(){

        return $this->belongsTo(Persona::class,'idPersona');
    }

    public function soporte(){

        return $this->hasMany(Soporte::class,'idAsistencia');
    }

    public function mantenimiento(){

        return $this->hasMany(Mantenimiento::class,'idAsistencia');
    }
}
