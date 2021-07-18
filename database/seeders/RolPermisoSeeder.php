<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolPermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permisoRol')->insert([
            [
                'idRol' => 1,
                'idOperacion' => 1,
            ],[
                'idRol' => 1,
                'idOperacion' => 2,
            ],[
                'idRol' => 1,
                'idOperacion' => 3,
            ],[
                'idRol' => 1,
                'idOperacion' => 4,
            ],[
                'idRol' => 2,
                'idOperacion' => 1,
            ],[
                'idRol' => 2,
                'idOperacion' => 2,
            ],[
                'idRol' => 2,
                'idOperacion' => 3,
            ],[
                'idRol' => 2,
                'idOperacion' => 4,
            ],[
                'idRol' => 3,
                'idOperacion' => 1,
            ],[
                'idRol' => 3,
                'idOperacion' => 2,
            ],[
                'idRol' => 3,
                'idOperacion' => 3,
            ],[
                'idRol' => 3,
                'idOperacion' => 4,
            ],[
                'idRol' => 4,
                'idOperacion' => 1,
            ],[
                'idRol' => 4,
                'idOperacion' => 3,
            ]
        ]);
    }
}
