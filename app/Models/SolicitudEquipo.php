<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudEquipo extends Model
{
    use HasFactory;
    protected $table='solicitudEquipo';

    public function persona()
    {
        return $this->belongsTo(Persona::class,'idPersona');
    }

    public function folmularioEquipo()
    {
        return $this->hasMany(FormularioEquipo::class,'idSolicitud');
    }

}
