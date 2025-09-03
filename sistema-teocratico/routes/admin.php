<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CircuitController;
use App\Http\Controllers\Admin\CongregationController;
use App\Http\Controllers\Admin\PrivilegeController;
use App\Http\Controllers\Admin\AssignmentController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\ReunionEntreSemanaController;
use App\Http\Controllers\Admin\ReunionFinDeSemanaController;


Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');


Route::resource('circuits', CircuitController::class)->except('show');
Route::resource('congregations', CongregationController::class)->except('show');
Route::resource('privileges', PrivilegeController::class)->except('show');
Route::resource('assignments', AssignmentController::class)->except('show');
Route::resource('groups', GroupController::class)->except('show');
Route::resource('publishers', PublisherController::class);
Route::resource('reunion-entre-semana', ReunionEntreSemanaController::class)
    ->names('reunion_entre_semana')
    ->except('show');

Route::resource('reunion-fin-de-semana', ReunionFinDeSemanaController::class)
    ->names('reunion_fin_de_semana')
    ->except('show');

