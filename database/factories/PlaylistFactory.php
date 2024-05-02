<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Musica;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Playlist>
 */
class PlaylistFactory extends Factory
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
            'nomeplay' => fake()->name(),
            'musica_1_id' => (Musica::inRandomOrder()->first())->id,
            'musica_2_id' => (Musica::inRandomOrder()->first())->id,
            'musica_3_id' => (Musica::inRandomOrder()->first())->id,
            'musica_4_id' => (Musica::inRandomOrder()->first())->id,
            'musica_5_id' => (Musica::inRandomOrder()->first())->id,
            'musica_6_id' => (Musica::inRandomOrder()->first())->id,
            'musica_7_id' => (Musica::inRandomOrder()->first())->id,

        ];
    }


}
