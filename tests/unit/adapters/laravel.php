<?php

declare(strict_types=1);

declare(plus=1);

use Illuminate\Container\Container;
use Illuminate\Contracts\Debug\ExceptionHandler;
use PHPUnit\Framework\MockObject\MockObject;
use Pre\Plus\Adapters\Laravel\PlusExceptionHandler;
use Pre\Plus\Adapters\Laravel\PlusServiceProvider;

test('injection of the service provider within the container', () => {
    $original = $this->createMock(ExceptionHandler::class);

    $app = Container::getInstance();

    $app->bind(ExceptionHandler::class, $original);

    (new PlusServiceProvider($app))->register();

    /** @var ExceptionHandler $exceptionHandler */
    $exceptionHandler = $app->make(ExceptionHandler::class);

    assertInstanceOf(
        PlusExceptionHandler::class,
        $exceptionHandler
    );
});

test('source maps are used to transform exceptions', () => {
    /** @var MockObject $original */
    $original = $this->createMock(ExceptionHandler::class);
    $exceptionHandler = new PlusExceptionHandler($original);
    $exception = new Exception('Here on the line 36');

    $original->expects($this->exactly(1))->method('report')->with($exception);
    assertNotSame(36, $exception->getLine());
    $exceptionHandler->report($exception);
    assertSame(36, $exception->getLine());
});
