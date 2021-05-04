<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedidoEquipo extends Model
{
    use HasFactory;

    
    protected $table='detalle_p_e';


    public function equipo(){
    
        return $this->belongsTo(Equipo::class,'IdEquipo');
    } 
    public function pedidoequipo(){
    
        return $this->belongsTo(PedidoEquipo::class,'IdPedidoEquipo');
    } 
     
}
