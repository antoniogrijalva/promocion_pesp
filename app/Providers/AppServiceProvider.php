<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Vite;
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
        Vite::prefetch(concurrency: 3);

         // Define el Gate para isAdmin
        Gate::define('isAdmin', function ($user) {
            return $user->tipo_usuario === 'administrador';
        });

        Gate::define('isSupervisor', function ($user) {
            return $user->tipo_usuario === 'supervisor';
        });
        
    }
}
