<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoSolicitud extends Model
{
    use HasFactory;

    protected $table='tiposolicitud';

    public function solicitud(){
        return $this->hasMany(Solicitud::class,'IdTipoSolicitud');
    } 
    

}
