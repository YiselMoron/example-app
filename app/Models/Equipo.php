<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $table='equipo';

    public function solicitudAlmacen()
    {
        return $this->hasMany(SolicitudAlmacen::class,'idEquipo');
    }

    public function formularioEquipo()
    {
        return $this->hasMany(FormularioEquipo::class,'idEquipo');
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class,'idMarca');
    }

    public function tipoEquipo()
    {
        return $this->belongsTo(TipoEquipo::class,'idTipoEquipo');
    }

}
