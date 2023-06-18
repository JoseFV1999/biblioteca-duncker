<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Asignatura;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'codigo' => $this -> faker() -> regexify('[A-Z]{2}[0-9]{3}'),
            'titulo' => $this -> faker() -> sentence(3),
            'autor' => $this -> faker() -> firstName($gender = null|'male'|'female'),
            'year' => $this -> faker() -> randomNumber(4, true),
            'mueble' => $this -> faker() -> regexify('[A-Z]{2}[0-9]{1}'),
            'observacion' => $this -> faker() -> randomKey(['C' => 1, 'O' => 2]),
            'asignatura_id' => Asignatura::inRandomOrder()->first()->id,
        ];
    }
}
