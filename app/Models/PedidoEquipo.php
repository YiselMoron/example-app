<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoEquipo extends Model
{
    use HasFactory;

    protected $table='pedidoEquipo';

    public function solicitudAlmacen()
    {
        return $this->hasMany(SolicitudAlmacen::class,'idPedidoEquipo');
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class,'idPersona');
    }

}
