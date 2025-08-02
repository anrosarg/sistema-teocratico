<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ReunionEntreSemanaController;
use App\Http\Controllers\ReunionFinDeSemanaController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí se registran las rutas web de tu aplicación.
| Estas rutas son cargadas por RouteServiceProvider y contienen el
| grupo de middleware "web". ¡Ahora crea algo increíble!
|
*/


Route::get('/', function () {
    return view('inicio');
})->name('inicio');
Route::get('/asignaciones', [HomeController::class, 'asignaciones'])->name('asignaciones');

Route::get('/fin-de-semana', [HomeController::class, 'finDeSemana'])->name('fin-de-semana');

// Agrupamos las rutas protegidas por Jetstream/Sanctum
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Ruta principal del panel
    Route::get('/dashboard', [PublisherController::class, 'index'])->name('dashboard');

    // Publicadores CRUD
    Route::resource('publishers', PublisherController::class);

    // Reunión entre semana CRUD
    Route::resource('reunion-entre-semana', ReunionEntreSemanaController::class);

    // Reunión fin de semana CRUD
    Route::resource('reunion-fin-de-semana', ReunionFinDeSemanaController::class);
});
