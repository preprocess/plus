<?php

declare(strict_types=1);

declare(plus=1);

//@formatter:off
final class FunctionKeywordTest
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

$foo = new FunctionKeywordTest();

test('methods', () => {
    assertEquals('foo', $foo->method());
});

test('final methods', () => {
    assertEquals('foo', $foo->methodFinal());
});

test('return type', () => {
    assertEquals('foo', $foo->methodWithReturnType());
});

test('args', () => {
    $args = ['1', 2, ['a', 'b']];
    $expected = array_merge($args, ['foo']);

    assertEquals($args + $expected, $foo->args(...$args));
});