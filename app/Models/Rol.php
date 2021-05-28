<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table='rol';

    public function vistaRol()
    {
        return $this->hasMany(VistaRol::class,'idRol');
    }

    public function rolPermiso()
    {
        return $this->hasMany(PermisoRol::class,'idRol');
    }

    public function user()
    {
        return $this->hasMany(User::class,'idUser');
    }
}
