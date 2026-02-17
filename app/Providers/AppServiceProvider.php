<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use livewire\livewire;

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
        // Livewire::setUpdateRoute(function ($handle) {
        //     return Route::post('/livewire/update', $handle);
        // });

        // Livewire::setScriptRoute(function ($handle) {
        //     return Route::get('/livewire/livewire.js', $handle);
        // });

        Livewire::setUpdateRoute(function ($handle) {
            return Route::post(env('APP_ROOT').'livewire/update', $handle)->middleware('web');
        });
        
        Livewire::setScriptRoute(function ($handle) {
            return Route::get(env('LIVEWIREJS').'livewire/livewire.js', $handle)->middleware('web');
        });
    }
}
