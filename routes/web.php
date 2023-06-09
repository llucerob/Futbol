<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\EstadioController;
use App\Http\Controllers\CompetenciaController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\UtilsController;


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
})->name('/');



Route::get('/dashboard', [UtilsController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    //clubes

    Route::get('club/crear', [ClubController::class, 'create'])->name('crear.club');
    Route::get('club/listar', [ClubController::class, 'index'])->name('listar.club');
    Route::get('club/borrar/{id}', [ClubController::class, 'delete'])->name('borrar.club');
    Route::post('club/store', [ClubController::class, 'store'])->name('store.club');
    Route::post('club/update', [ClubController::class, 'update'])->name('update.club');
    Route::get('club/edit/{id}', [ClubController::class, 'edit'])->name('edit.club');
    Route::get('club/{id}/series/', [ClubController::class, 'agregarseries'])->name('agregar.serie');
    Route::post('club/series/asignar', [ClubController::class, 'serie'])->name('store.serie');


    //estadios

    Route::get('estadio/crear', [EstadioController::class, 'create'])->name('crear.estadio');
    Route::get('estadio/listar', [EstadioController::class, 'index'])->name('listar.estadio');
    Route::get('estadio/borrar/{id}', [EstadioController::class, 'delete'])->name('borrar.estadio');
    Route::post('estadio/store', [EstadioController::class, 'store'])->name('store.estadio');
    Route::post('estadio/update', [EstadioController::class, 'update'])->name('update.estadio');
    Route::get('estadio/edit/{id}', [EstadioController::class, 'edit'])->name('edit.estadio');



    //competencias

    Route::get('competencia/listar', [CompetenciaController::class, 'index'])->name('listar.competencia');
    Route::get('competencia/crear', [CompetenciaController::class, 'create'])->name('crear.competencia');
    Route::post('competencia/fixture', [CompetenciaController::class, 'store'])->name('store.competencia');
    Route::get('competencia/{id}/verfechas', [CompetenciaController::class, 'verfechas'])->name('ver.fechas');
    Route::get('competencia/{comp}/{fech}/programar', [CompetenciaController::class, 'programar'])->name('programar.encuentro');
    Route::get('competencia/{comp}/{fech}/verencuentros', [CompetenciaController::class, 'verencuentros'])->name('ver.encuentro');
    Route::get('competencia/programar/partido/{id}', [CompetenciaController::class, 'programapartido'])->name('programa.partido');
    Route::post('competencia/cargarencuentro', [CompetenciaController::class, 'cargarencuentro'])->name('cargar.encuentro');
    Route::post('competencia/update/resultados', [CompetenciaController::class, 'updateresultados'])->name('update.resultados');
    Route::post('competencia/updatepartido/{id}', [CompetenciaController::class, 'updatepartido'])->name('update.partido');


    
    route::get('prueba', [CompetenciaController::class, 'prueba']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //jugadores

    Route::get('jugador/crear', [JugadorController::class, 'create'])->name('crear.jugador');
    Route::get('jugador/listar', [JugadorController::class, 'index'])->name('listar.jugador');
    Route::get('jugador/borrar/{id}', [JugadorController::class, 'delete'])->name('borrar.jugador');
    Route::post('jugador/store', [JugadorController::class, 'store'])->name('store.jugador');
    Route::post('jugador/update', [JugadorController::class, 'update'])->name('update.jugador');
    Route::get('jugador/edit/{id}', [JugadorController::class, 'edit'])->name('edit.jugador');


    //Mensajes

    
    Route::post('mensajes/store', [UtilsController::class, 'storemensaje'])->name('crear.mensaje');



});

require __DIR__.'/auth.php';
