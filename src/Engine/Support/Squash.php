<?php

namespace Pre\Plus\Engine\Support;

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
    $stream = preg_replace("/\\s+/", "", $stream);

    return TokenStream::fromSource(
        $engine->expand($stream, "", Engine::GC_ENGINE_DISABLED)
    );
}
