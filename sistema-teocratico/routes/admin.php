<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CircuitController;
use App\Http\Controllers\Admin\CongregationController;
use App\Http\Controllers\Admin\PrivilegeController;
use App\Http\Controllers\Admin\AssignmentController;
use App\Http\Controllers\Admin\GroupController;


Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');


Route::resource('circuits', CircuitController::class)->except('show');
Route::resource('congregations', CongregationController::class)->except('show');
Route::resource('privileges', PrivilegeController::class)->except('show');
Route::resource('assignments', AssignmentController::class)->except('show');
Route::resource('groups', GroupController::class)->except('show');