<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nome" => fake()->name(),
            "descricao" => fake()->text(100),
            "preco" => fake()->randomFloat(2, 101, 200),
            "preco_custo" => fake()->randomFloat(2, 1, 100),
            "qtd_estoque" => fake()->randomNumber(3),
            "qtd_minima" => fake()->randomNumber(3)
        ];
    }
}
