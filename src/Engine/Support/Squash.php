<?php

declare(strict_types=1);

namespace Pre\Plus\Engine\Support;

use Pre\Plus\Exceptions\ShouldNotHappen;
use Yay\Engine;
use Yay\TokenStream;


/**
 * @param  TokenStream  $stream
 * @param  Engine  $engine
 *
 * @return TokenStream
 *
 * @internal
 */
function squash(TokenStream $stream, Engine $engine): TokenStream
{
    $stream = preg_replace("/\\s+/", "", $stream->__toString());

    if (! is_string($stream)) {
        throw new ShouldNotHappen('Stream must be a string.');
    }

    return TokenStream::fromSource(
        $engine->expand($stream, "", Engine::GC_ENGINE_DISABLED)
    );
}
