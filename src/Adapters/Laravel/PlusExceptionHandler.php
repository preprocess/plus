<?php

declare(strict_types=1);

namespace Pre\Plus\Adapters\Laravel;

use Exception;
use Illuminate\Contracts\Debug\ExceptionHandler;

/**
 * @internal
 */
final class PlusExceptionHandler implements ExceptionHandler
{
    /**
     * Holds an instance of the original exception handler.
     *
     * @var \Illuminate\Contracts\Debug\ExceptionHandler
     */
    private $original;

    /**
     * Creates a new instance of the ExceptionHandler.
     *
     * @param  \Illuminate\Contracts\Debug\ExceptionHandler  $original
     */
    public function __construct(ExceptionHandler $original)
    {
        $this->original = $original;
    }

    /**
     * {@inheritdoc}
     */
    public function report(Exception $e)
    {
        \Pre\Plus\PanicHandlers\ExceptionHandler::transform($e);

        $this->original->report($e);
    }

    /**
     * {@inheritdoc}
     */
    public function render($request, Exception $e)
    {
        \Pre\Plus\PanicHandlers\ExceptionHandler::transform($e);

        return $this->original->render($request, $e);
    }

    /**
     * {@inheritdoc}
     */
    public function renderForConsole($output, Exception $e)
    {
        \Pre\Plus\PanicHandlers\ExceptionHandler::transform($e);

        $this->original->renderForConsole($output, $e);
    }

    /**
     * {@inheritdoc}
     */
    public function shouldReport(Exception $e)
    {
        return $this->original->shouldReport($e);
    }
}
