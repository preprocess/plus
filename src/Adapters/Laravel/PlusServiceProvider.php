<?php

declare(strict_types=1);

namespace Pre\Plus\Adapters\Laravel;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Debug\ExceptionHandler;

/**
 * @internal
 */
final class PlusServiceProvider extends ServiceProvider
{
    /**
     * Registers the Plus Exception Handler.
     *
     * @return void
     */
    public function register(): void
    {
        $appExceptionHandler = $this->app->make(ExceptionHandler::class);

        $this->app->singleton(
            ExceptionHandler::class,
            function () use ($appExceptionHandler) {
                return new PlusExceptionHandler($appExceptionHandler);
            }
        );
    }
}
