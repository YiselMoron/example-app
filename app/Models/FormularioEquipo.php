<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormularioEquipo extends Model
{
    use HasFactory;

    protected $table='formularioEquipo';

    public function equipo()
    {
        return $this->belongsTo(Equipo::class,'idEquipo');
    }

    public function solicitudEquipo()
    {
        return $this->belongsTo(SolicitudEquipo::class,'idSolicitud');
    }

    public function asignacionEquipo()
    {
        return $this->hasMany(AsignacionEquipo::class,'idFormulario');
    }

}
