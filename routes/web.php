<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstallerController;
use Illuminate\Support\Facades\Route;


Route::get('/setup', [InstallerController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);
