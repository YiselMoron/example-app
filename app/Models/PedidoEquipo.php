<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoEquipo extends Model
{
    use HasFactory;
    protected $table='pedidoequipo';


    public function persona(){

        return $this->belongsTo(Persona::class,'IdPersona');
    }
    public function detalle_p_e(){

        return $this->hasOne(DetallePedidoEquipo::class,'IdPedidoEquipo');
    }
}
