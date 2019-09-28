<?php

declare(plus=1);

class TestClass
{
    public $nill;

    public $int = 1;

    public $string = 'foo';

    public $stdClass = new stdClass();

    public $function = function () {
        return 'foo';
    };

    /** @todo Understand why those cases won't work as expected.
    public $oneLineArrowFunctions = () => 'foo';

    public $multipleLineArrowFunctions = () => {
        return 'foo';
    };
    */
}

$testClass = new TestClass();

test('nill', () => assertNull($test->nill));

test('int', () => assertEquals($testClass->int, 1));

test('string', () => assertEquals($testClass->string, 'foo'));

test('object', () => assertInstanceOf(stdClass::class, $testClass->stdClass));

test('function', () => assertEquals(($testClass->function)(), 'foo'));

/** @todo Understand why those cases won't work as expected.

test('one line arrow functions', () => assertEquals(($testClass->oneLineArrowFunctions)(), 'foo'));

test('multiple line arrow functions', () => assertEquals(($testClass->multipleLineArrowFunctions)(), 'foo'));
*/