<?php

use Illuminate\Support\Facades\Route;
use App\Models\ReunionEntreSemana;
use App\Models\ReunionFinDeSemana;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/asignaciones', function () {
    $start = now()->startOfMonth()->toDateString();
    $end   = now()->copy()->addMonthNoOverflow()->endOfMonth()->toDateString();

    $reuniones = ReunionEntreSemana::with([
        'acomodadorPuerta','acomodadorAuditorio','microfono1','microfono2',
        'encargadoAudio','encargadoVideo','plataforma',
    ])
    ->whereBetween('fecha', [$start, $end])
    ->orderBy('fecha', 'asc')
    ->get(); // <- colección simple para poder agrupar

    return view('front.asignaciones.index', compact('reuniones'));
})->name('front.asignaciones.index');

Route::get('/asignaciones/fin_de_semana', function () {
    $start = now()->startOfMonth()->toDateString();
    $end   = now()->copy()->addMonthNoOverflow()->endOfMonth()->toDateString();

    $reuniones = ReunionFinDeSemana::with(['presidente','lector'])
        ->whereBetween('fecha', [$start, $end])
        ->orderBy('fecha', 'asc')
        ->get(); // colección simple para agrupar por mes

    return view('front.asignaciones.fin_de_semana', compact('reuniones'));
})->name('front.asignaciones.fin_de_semana');

//Route::middleware([
  //  'auth:sanctum',
  //  config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
   // Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});
