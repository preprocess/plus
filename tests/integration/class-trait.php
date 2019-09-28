<?php

declare(strict_types=1);

declare(plus=1);

class A
{
}

class B
{
}

class C extends A
{
}

interface D
{
}

class E implements D
{
}

test('trait is always added', () => {
    $classes = [
        A::class,
        B::class,
        C::class,
        E::class,
    ];

    foreach ($classes as $class) {
        assertArrayHasKey(\Pre\Plus\Engine\__Class::class, class_uses($class), "$class do not have the trait");
    }
});