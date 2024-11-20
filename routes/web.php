<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstallerController;
use App\Http\Controllers\SoftMailerController;
use Illuminate\Support\Facades\Route;


Route::get('/setup', [InstallerController::class, 'index']);
Route::post('/setup', [InstallerController::class, 'store'])->name('installer.store');
Route::get('/', [HomeController::class, 'index'])->name('home');


// Mail send
Route::view('compose', "Mail.mail-form")->name('mail.compose');
Route::post('soft-mailer', [SoftMailerController::class, 'mailSend'])->name('mail.send');
