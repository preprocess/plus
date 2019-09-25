<?php

declare(strict_types=1);

declare(plus=1);

$foo = new Foo();

test('methods', function () use ($foo) {
    assertEquals('foo', $foo->method());
});

test('final methods', function () use ($foo) {
    assertEquals('foo', $foo->methodFinal());
});

test('return type', function () use ($foo) {
    assertEquals('foo', $foo->methodWithReturnType());
});

test('args', function () use ($foo) {
    $args = ['1', 2, ['a', 'b']];
    $expected = array_merge($args, ['foo']);

    assertEquals($args + $expected, $foo->args(...$args));
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
