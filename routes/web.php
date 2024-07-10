<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicaController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\AvaliacoesController;
use App\Http\Controllers\ReclameController;
use App\Http\Controllers\CompositorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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
Route::post('/musica/search', [MusicaController::class, "search"])->name('musica.search');
Route::get('/musica/chart',
     [MusicaController::class, "chart"])->name('musica.chart');
Route::get('/musica/report/',
      [musicaController::class, "report"]) ->name('musica.report');
Route::resource('musica', MusicaController::class);

Route::get('/categoria', [CategoriaController::class, "index"]);
Route::post('/categoria/search', [CategoriaController::class, "search"])->name('categoria.search');

Route::resource('playlist', PlaylistController::class);
Route::post('/playlist/search', [PlaylistController::class, "search"])->name('playlist.search');

Route::resource('avaliacoes', AvaliacoesController::class);
Route::post('/avaliacoes/search', [AvaliacoesController::class, "search"])->name('avaliacoes.search');

Route::post('/reclame/search', [ReclameController::class, "search"])->name('reclame.search');
Route::get('/reclame/chart',
     [ReclameController::class, "chart"])->name('reclame.chart');
Route::get('/reclame/report/',
      [reclameController::class, "report"]) ->name('reclame.report');
Route::resource('reclame', ReclameController::class);

Route::resource('compositor', CompositorController::class);
Route::post('/compositor/search', [CompositorController::class, "search"])->name('compositor.search');
