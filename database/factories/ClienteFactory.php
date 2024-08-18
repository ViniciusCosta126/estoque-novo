<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
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
            'telefone' => fake()->phoneNumber(),
            'endereco' => fake()->address(),
            'numero_endereco' => fake()->randomNumber(3),
            'complemento' => '',
            'email' => fake()->email(),
            'cpf' => fake()->creditCardNumber()
        ];
    }
}
