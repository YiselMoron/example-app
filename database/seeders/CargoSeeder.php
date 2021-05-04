<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargo')->insert([
            [
                'NombreCargo' => 'Secretaria'
            ], [
                'NombreCargo' => 'Gerente General'
            ], [
                'NombreCargo' => 'Auxiliar de Sistemas'
            ]
        ]);
    }
}
