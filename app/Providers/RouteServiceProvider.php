<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::middleware('api')
                ->prefix('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));
        });

        // Register the middleware
        Route::aliasMiddleware('role', \App\Http\Middleware\CheckRole::class);
        Route::aliasMiddleware('check.parrainage.period', \App\Http\Middleware\CheckParrainagePeriod::class);
    }

    protected function configureRateLimiting()
    {
        // Configuration de la limitation de débit
    }
}