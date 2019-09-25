<?php

declare(strict_types=1);

declare(plus=1);

$foo = 'foo';

test('one line short closures scope', () => assertEquals('foo', $foo));

test('multi line short closures scope', () => {
    assertEquals('foo', $foo);
});

$tap = () => {
    assertTrue(true);

    return true;
};

test('one line short closures with return type', (): bool => $tap());

test('multi line short closures with return type', (): void => {
    assertTrue(true);
});

test('one line short closures within arrays', () => {
    $array = ['foo' => () => 'bar'];

    assertEquals($array['foo'](), 'bar');
});

test('multi line short closures within arrays', () => {
    $array = ['foo' => () => {
        return 'bar';
    }];

    assertEquals($array['foo'](), 'bar');
});

/**
 * @todo Understand why those cases won't work as expected.
 *
 * test('one line short closures as callback', () => assertEquals(array_map(($value) => $value, [2]), [2]));
 * test('multi line short closures as callback', () => assertEquals(array_map(($value) => {
 *   return $value;
 * }, [2]), [2]));
 */
