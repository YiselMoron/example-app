<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudAlmacen extends Model
{
    use HasFactory;
    protected $table= 'solicitudAlmacen';

    public function equipo()
    {
        return $this->belongsTo(Equipo::class,'idEquipo');
    }

    public function pedidoEquipo()
    {
        return $this->belongsTo(PedidoEquipo::class,'idPedidoEquipo');
    }

}
