<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisoRol extends Model
{
    use HasFactory;

    protected $table='permisoRol';

    public function rol()
    {
        return $this->belongsTo(Rol::class,'idRol');
    }

    public function operacion()
    {
        return $this->belongsTo(Operacion::class,'idOperacion');
    }

}
