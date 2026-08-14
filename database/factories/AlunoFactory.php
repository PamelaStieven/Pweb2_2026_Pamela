<?php

namespace Database\Factories;

use App\Models\Aluno;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Aluno>
 */
class AlunoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array // Esse em específico está criando dados falsos que, ao criarmos a tabela, ele preencherá com esses dados.
    {
        return [
            'nome' => fake()->name(),
            'cpf' => fake()->numerify('###.###.###-##'),
            'telefone' => fake()->phoneNumber()
        ];
    }
}
