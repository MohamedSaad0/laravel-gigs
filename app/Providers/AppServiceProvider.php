<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
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
        // Blade::if('glob_var', function () {
        //     $user = auth()->user();
        //     if ($user) {
        //         return $user->name == 'testo';
        //     } else {
        //         return null;
        //     }
        // });
        // view()->composer('*', function ($view) {
        //     View::share('current_user', auth()->user());
        // });
    }
}
