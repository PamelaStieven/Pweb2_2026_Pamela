<?php

namespace Database\Factories;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Turma>
 */
class TurmaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'curso_id' => (Curso::All()->random()->id),
            'codigo' => fake()->numerify('TURMA-####'),
            'data_inicio' => fake()->date(),
            'data_fim' => fake()->date(),
        ];
    }
}
