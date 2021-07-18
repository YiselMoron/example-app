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
        $user->idRol = '2';
        $user->save();
        $persona = new Persona;
        $persona->nombreCompleto = 'Yisel Moron F' ;
        $persona->celular = 77777777;
        $persona->idUser = $user->id;
        $persona->idCargo = 1;
        $persona->idDepartamento = 2;
        $persona->save();

        $user2 = new User;
        $user2->name = 'Camila Parra Flores';
        $user2->email = 'camilaparraflores@gmail.com';
        $user2->password = Hash::make('123456789');
        $user2->idRol = '1';
        $user2->save();
        $persona2 = new Persona;
        $persona2->nombreCompleto = 'Camila Parra Flores' ;
        $persona2->celular = 77777777;
        $persona2->idUser = $user2->id;
        $persona2->idCargo = 2;
        $persona2->idDepartamento = 1;
        $persona2->save();

        $user3 = new User;
        $user3->name = 'Matias Solares Perez';
        $user3->email = 'matiassolaresperez@gmail.com';
        $user3->password = Hash::make('123456789');
        $user3->idRol = '3';
        $user3->save();
        $persona3 = new Persona;
        $persona3->nombreCompleto = 'Matias Solares Perez' ;
        $persona3->celular = 77777777;
        $persona3->idUser = $user3->id;
        $persona3->idCargo = 2;
        $persona3->idDepartamento = 3;
        $persona3->save();

        $user4 = new User;
        $user4->name = 'Jose Luis Teran';
        $user4->email = 'joseluisteran@gmail.com';
        $user4->password = Hash::make('123456789');
        $user4->idRol = '4';
        $user4->save();
        $persona4 = new Persona;
        $persona4->nombreCompleto = 'Jose Luis Teran' ;
        $persona4->celular = 77777777;
        $persona4->idUser = $user4->id;
        $persona4->idCargo = 3;
        $persona4->idDepartamento = 1;
        $persona4->save();
    }
}
