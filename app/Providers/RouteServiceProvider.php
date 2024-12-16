<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->routes(function () {
            Route::prefix('api')               // Prefijo para rutas API
                ->middleware('api')            // Middleware para APIs
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php')); // Carga el archivo api.php

            Route::middleware('web')           // Middleware para rutas web
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php')); // Carga el archivo web.php
        });
    }
}
