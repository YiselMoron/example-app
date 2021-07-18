<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('operacion')->insert([
            [
                'nombre' => 'guardar'
            ], [
                'nombre' => 'eliminar'
            ], [
                'nombre' => 'actualizar'
            ], [
                'nombre' => 'procesar'
            ]
        ]);
    }
}
