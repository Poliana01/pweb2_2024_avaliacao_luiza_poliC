<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompositorFactory extends Factory
{
    protected static ?string $password;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nNome' => fake()->name(),
            'nMusica' => fake()->name(),
            'nLink' => fake()->name(),
            'nAvaliacao' => fake()->name(),

        ];
    }
   
}
