<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marca')->insert([
            [
                'nombre' => 'LENOVO'
            ], [
                'nombre' => 'HP'
            ], [
                'nombre' => 'ACER'
            ], [
                'nombre' => 'DELL'
            ], [
                'nombre' => 'APPLE'
            ], [
                'nombre' => 'TOSHIBA'
            ], [
                'nombre' => 'SAMSUNG'
            ], [
                'nombre' => 'ASUS'
            ]
        ]);
    }
}
