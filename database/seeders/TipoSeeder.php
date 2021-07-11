<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipoEquipo')->insert([
            [
                'nombre' => 'PC'
            ], [
                'nombre' => 'LAPTOP'
            ], [
                'nombre' => 'TABLET'
            ], [
                'nombre' => 'MOUSE'
            ], [
                'nombre' => 'TECLADO'
            ], [
                'nombre' => 'IMPRESORA'
            ], [
                'nombre' => 'ESCANER'
            ], [
                'nombre' => 'MONITOR'
            ], [
                'nombre' => 'OTROS'
            ]
        ]);
    }
}
