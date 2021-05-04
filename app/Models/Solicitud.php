<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    protected $table='solicitud';
    
    public function tiposolicitud(){
    
        return $this->belongsTo(TipoSolicitud::class,'IdTipoSolicitud');
    } 
    public function mantenimiento(){
        return $this->hasMany(Mantenimiento::class,'IdSolicitud');
    } 
    public function persona(){
        return $this->belongsTo(Persona::class,'IdPersona');
    } 
}
