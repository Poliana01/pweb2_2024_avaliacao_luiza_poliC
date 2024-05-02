<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;

class MusicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Categoria::factory()->count(9)->create();
    }
}
