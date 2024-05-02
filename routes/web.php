<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicaController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\AvaliacoesController;

Route::get('/', function () {
    return view('welcome');
});
/*
//routes/web.php
Route::get('/aluno', [AlunoController::class, "index"]);
//carrega o formulário
Route::get('/aluno/create', [AlunoController::class, "create"]);
//recebe os dados do formulario para ser salvo na função store
Route::post('/aluno', [AlunoController::class, "store"])->name('aluno.store');
//Route::get('/aluno/destroy/{$id}', [AlunoController::class, "destroy"])->name('aluno.destroy');
Route::delete('/aluno/{$aluno}',
 [AlunoController::class, "destroy"])->name('aluno.destroy');

 Route::get('/aluno/edit/{id}', [AlunoController::class, "edit"])
    ->name('aluno.edit');
 Route::post('/aluno',
  [AlunoController::class, "update"])->name('aluno.update');
*/
Route::resource('musica', MusicaController::class);
Route::post('/musica/search', [MusicaController::class, "search"])->name('musica.search');

Route::get('/categoria', [CategoriaController::class, "index"]);
Route::post('/categoria/search', [CategoriaController::class, "search"])->name('categoria.search');

Route::resource('playlist', PlaylistController::class);
Route::post('/playlist/search', [PlaylistController::class, "search"])->name('playlist.search');

Route::resource('avaliacoes', AvaliacoesController::class);
Route::post('/avaliacoes/search', [AvaliacoesController::class, "search"])->name('avaliacoes.search');
