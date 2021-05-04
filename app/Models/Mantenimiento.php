<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;

    protected $table='mantenimiento';
    

    public function solicitud(){
    
        return $this->belongsTo(Solicitud::class,'IdSolicitud');
    } 
    public function detalle_persona_equipo(){
    
        return $this->belongsTo(DetallePersonaEquipo::class,'IdDetallePersonaEquipo');
    } 
}
