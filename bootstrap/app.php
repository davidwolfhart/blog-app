<?php

<<<<<<< HEAD
use App\Http\Middleware\RedirectIfAuthenticated;
=======
>>>>>>> caff542facae210c01436af0469a396724c1fdd6
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
<<<<<<< HEAD
        // $middleware->use([
        //     RedirectIfAuthenticated::class
        // ]);
=======
        //
>>>>>>> caff542facae210c01436af0469a396724c1fdd6
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
