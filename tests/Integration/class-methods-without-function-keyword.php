<?php

declare(strict_types=1);

declare(plus=1);

$a = new Foo();

test('methods', function () use ($a) {
    assertEquals('foo', $a->method());
});

test('final methods', function () use ($a) {
    assertEquals('foo', $a->methodFinal());
});

test('return type', function () use ($a) {
    assertEquals('foo', $a->methodWithReturnType());
});

test('args', function () use ($a) {
    $args = ['1', 2, ['a', 'b']];
    $expected = array_merge($args, ['foo']);

    assertEquals($args + $expected, $a->args(...$args));
});


//@formatter:off
class Foo
{
    public method()
    {
        return 'foo';
    }

    final public methodFinal()
    {
        return 'foo';
    }

    public methodWithReturnType(): string
    {
        return 'foo';
    }

    public args($a, int $b, array $c, $d = 'foo'): array
    {
        return [$a, $b, $c, $d];
    }
}
//@formatter:on
