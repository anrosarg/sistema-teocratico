<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');