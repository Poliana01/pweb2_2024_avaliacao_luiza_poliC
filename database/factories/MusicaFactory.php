<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Categoria;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Musica>
 */
class MusicaFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'usuario' => fake()->name(),
            'nmusica' => fake()->name(),
            'artista' => fake()->name(),
            'ano' => fake()->randomNumber(3, false),
            'link' => fake()->name(),
            'categoria_id' => (Categoria::inRandomOrder()->first())->id,
        ];
    }
}
