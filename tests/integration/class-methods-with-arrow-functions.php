<?php

declare(strict_types=1);

declare(plus=1);

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


//@formatter:off
class ArrowFunctionsTest
{
    public str() => 'foo';

    public obj() => new stdClass();

    public args($arr) => $arr;
}
//@formatter:on
