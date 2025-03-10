<?php

use App\Http\Middleware\CheckLockedAccount;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->web(append: [
            CheckLockedAccount::class,
        ]);
        // Nếu bạn muốn áp dụng middleware cho một nhóm cụ thể (ví dụ: 'admin'), bạn có thể định nghĩa alias
        // $middleware->alias([
        //     'check.locked' => CheckLockedAccount::class,
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
