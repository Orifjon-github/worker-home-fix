<?php

namespace App\Payme;


use Illuminate\Contracts\Debug\ExceptionHandler;
use App\Payme\Exceptions\PaymeExceptionHandler;
use Illuminate\Support\ServiceProvider;

class PaymeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {

        $this->publishes([
            __DIR__ . '/config/payme.php' => config_path('payme.php'),
        ], 'payme-config');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    public function register(): void
    {
        $this->app->singleton(
            ExceptionHandler::class,
            PaymeExceptionHandler::class
        );

        $this->app->bind('payme', function () {
            return new Payme();
        });
    }
}
