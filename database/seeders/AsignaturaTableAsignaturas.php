<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Asignatura;

class AsignaturaTableAsignaturas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $asignatura1 = new Asignatura;
        $asignatura1->nombre = "Partitura";
        $asignatura1->abreviacion = 'PART';
        $asignatura1->save();
    }
}
