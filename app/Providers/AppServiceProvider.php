<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Simple custom @admin ... @endadmin directive using Blade::if
        Blade::if('admin', function () {
            // If you don't have an is_admin column, use the line with id === 1
            // return auth()->check() && (auth()->user()->is_admin ?? false);
            return auth()->check() && auth()->id() === 1;
        });
    }
}
