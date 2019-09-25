<?php

declare(strict_types=1);

declare(plus=1);

test('catch application exceptions', function () {
    try {
        throw new Exception();
    }

    assertTrue(true);
});

test('does not catch exceptions that not extend \Exception', function () {

    $e = null;

    try {
        try {
            throw new ParseError();
        }
    } catch (Throwable $e) {

    }


    assertNotNull($e);
});
