<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $table='equipo';


    public function tipoequipo(){
    
        return $this->belongsTo(TipoEquipo::class,'IdTipoEquipo');
    } 
    public function detalle_p_e(){
    
        return $this->hasMany(DetallePedidoEquipo::class,'IdEquipo');
    } 
    public function detalle_persona_equipo(){
    
        return $this->hasMany(DetallePersonaEquipo::class,'IdEquipo');
    } 
    
}
