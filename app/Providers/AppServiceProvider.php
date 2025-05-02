<?php

namespace App\Providers;

<<<<<<< HEAD
use Illuminate\Pagination\Paginator;
=======
>>>>>>> caff542facae210c01436af0469a396724c1fdd6
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
<<<<<<< HEAD
        Paginator::useBootstrapFive();
=======
        //
>>>>>>> caff542facae210c01436af0469a396724c1fdd6
    }
}
