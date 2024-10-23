<?php

namespace App\Providers;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstallerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (file_exists(public_path('installed.php'))) {
            Route::middleware('web')->group(function () {
                Route::get('/', [HomeController::class, 'index']);
            });
        } else {
            Route::middleware('web')->group(function () {
                Route::get('/setup', [InstallerController::class, 'installer']);
            });
        }
    }
}
