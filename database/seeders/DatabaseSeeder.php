<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Asignatura;
use App\Models\Libro;

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
        //$this->call([
        //    AsignaturaTableAsignaturas::class,
        //]);

        Asignatura::factory(10)->create();
        Libro::factory(20)->create();
    }
}
