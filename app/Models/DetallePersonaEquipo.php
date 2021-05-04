<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePersonaEquipo extends Model
{
    use HasFactory;

    protected $table='detalle_persona_equipo';


    public function equipo(){
    
        return $this->belongsTo(Equipo::class,'IdEquipo');
    } 
    public function persona(){
    
        return $this->belongsTo(Persona::class,'IdPersona');
    } 
    public function mantenimiento(){
    
        return $this->hasMany(Mantenimiento::class,'IdDetallePersonaEquipo');
    } 
}
