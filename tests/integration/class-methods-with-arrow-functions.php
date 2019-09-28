<?php

declare(strict_types=1);

declare(plus=1);

//@formatter:off
class ArrowFunctionsTest
{
    public str(): string => 'foo';

    public obj() => new stdClass();

    public args($arr) => $arr;
}
//@formatter:on

$foo = new ArrowFunctionsTest();

test('with str', () => {
    assertEquals('foo', $foo->str());
});

test('with obj', () => {
    assertEquals(new stdClass(), $foo->obj());
});

test('with args', () => {
    assertEquals([10], $foo->args([10]));
});
