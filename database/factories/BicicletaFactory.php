<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BicicletaFactory extends Factory {
    public function definition(): array {
        return [
            'marca' => $this->faker->randomElement(['Caloi', 'Oggi', 'Sense', 'Specialized']),
            'modelo' => $this->faker->word(),
            'preco' => $this->faker->randomFloat(2, 1200, 15000),
        ];
    }
}