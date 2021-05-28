<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soporte extends Model
{
    use HasFactory;

    protected $table='soporte';

    public function asistenciaTecnica()
    {
        return $this->belongsTo(AsistenciaTecnica::class,'idAsistencia');
    }

}
