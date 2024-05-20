<?php


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
        $middleware->alias([
            'UserCheck' => \App\Http\Middleware\UserCheck::class,
            'isAdminLogin' => \App\Http\Middleware\AdminCheck::class,
           'AuthCheck' => \App\Http\Middleware\AuthCheck::class,
        ]);
        // $middleware->append(App\Http\Middleware\AuthCheck::class);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
