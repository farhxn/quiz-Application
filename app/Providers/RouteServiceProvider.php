<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Register routes defined in the "routes" directory
        Route::currentRouteName(); // This line helps with early type checking

        // Group web routes under 'web' middleware
        Route::middleware('web')->group(function () {
            require base_path('routes/web.php');
        });

        // Optionally define API routes under a separate middleware
        // Route::middleware('api')->group(function () {
        //     require base_path('routes/api.php');
        // });
    }
}
