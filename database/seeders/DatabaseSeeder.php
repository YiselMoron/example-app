<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(CargoSeeder::class);
        $this->call(DepartamentoSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MarcaSeeder::class);
        $this->call(TipoSeeder::class);
        $this->call(OperacionSeeder::class);
        $this->call(RolPermisoSeeder::class);

    }
}
