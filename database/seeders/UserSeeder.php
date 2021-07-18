<?php

namespace Database\Seeders;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Yisel Moron F';
        $user->email = 'ymoronflores@gmail.com';
        $user->password = Hash::make('123456789');
        $user->idRol = '1';
        $user->save();
        $persona = new Persona;
        $persona->nombreCompleto = 'Yisel Moron F' ;
        $persona->celular = 77777777;
        $persona->idUser = $user->id;
        $persona->idCargo = 1;
        $persona->idDepartamento = 2;
        $persona->save();

    }
}
