<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Categoria::factory()->count(9)->create();
        Categoria::create(['nome' => 'Pop']);
        Categoria::create(['nome' => 'Rock']);
        Categoria::create(['nome' => 'Eletrônica']);
        Categoria::create(['nome' => 'Musica Popular Brasileira']);
        Categoria::create(['nome' => 'Raggae']);
        Categoria::create(['nome' => 'Samba']);
        Categoria::create(['nome' => 'HipHop']);
        Categoria::create(['nome' => 'Sertanejo']);
        Categoria::create(['nome' => 'Pagode']);
    }
}
